<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
	protected $table = 'siswa';
	protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin','agama','alamat','avatar','user_id'];

	public function getAvatar()
	{
		if (!$this->avatar) {
			return asset('images/default.jpg');
		}
		return asset('images/'.$this->avatar);
	}

	public function mapel()
	{
		return $this->belongsToMany(mapel::class)->withPivot(['nilai'])->withTimeStamps();
	}
	public function ratanilai()
	{
		//ambil nilai
		$total = 0;
		$hitung = 0;
		foreach ($this->mapel as $mapel) {
			$total += $mapel->pivot->nilai;
			$hitung++;
		}
		return round($total/$hitung);
	}
	public function namalengkap()
	{
		return $this->nama_depan.' '.$this->nama_belakang;
	}
}
