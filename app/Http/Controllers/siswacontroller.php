<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class siswacontroller extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_siswa = \App\Siswa::all();
        }
        return view('siswa.index',['data_siswa' => $data_siswa]);
    }
    public function create(Request $request)
    {
        $this->validate($request,[
            'nama_depan' => 'required|min:5',
            'nama_belakang' => 'required',
            'email'     => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama'     => 'required',
            'avatar'    => 'mimes:jpg,png,jpeg,gif'
        ]);
        //insert ke table user
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random();
        $user->save();

        //insert ke table siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Siswa::create($request->all());
        if ($request->hasfile('avatar')) 
        {
           $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
           $siswa->avatar = $request->file('avatar')->getClientOriginalName();
           $siswa->save();
       }
       return redirect('/siswa')->with('sukses','Data Berhasil di Input');
   }
   public function edit($id)
   {
       $siswa = \App\Siswa::Find($id);
       return view('siswa/edit',['siswa' => $siswa]);
   }
   public function update(Request $request,$id)
   {
       $siswa = \App\Siswa::Find($id);
       $siswa->update($request->all());
       if ($request->hasfile('avatar')) 
       {
           $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
           $siswa->avatar = $request->file('avatar')->getClientOriginalName();
           $siswa->save();
       }
       return redirect('/siswa')->with('sukses','Data Berhasil di Update');
   }
   public function delete($id)
   {
    $siswa = \App\Siswa::Find($id);
    $siswa->delete($siswa);
    return redirect('/siswa')->with('sukses','Data Berhasil di Hapus');
}
public function profile($id)
{
    $siswa = \App\Siswa::Find($id);
    $mapela = \App\Mapel::all();

        //data chart
    $categories=[];
    $data = [];

    foreach ($mapela as $mp) {
        if ($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()) {
            $categories[] = $mp->nama;
            $data[]       = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
        }
    }
        //dd($mapela);
    return view('siswa.profile',['siswa' => $siswa],['mapela' => $mapela,'categories' => $categories,'data' => $data]);
}
public function nilai(Request $request ,$id)
{
   $siswa = \App\Siswa::Find($id);
   if ($siswa->mapel()->where('mapel_id',$request->mapel)->exists()) {
    return redirect('siswa/'.$id.'/profile')->with('error','Data Telah Ada !');
}
$siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);

return redirect('siswa/'.$id.'/profile')->with('sukses','Nilai Berhasil Di Tambahkan !');
}
public function deletenilai($id,$idmapel)
{
    $siswa = \App\Siswa::Find($id);
    $siswa->mapel()->detach($idmapel);
    return redirect()->back()->with('sukse','Data Niai Berhasil Di Hapus...');
}
}

