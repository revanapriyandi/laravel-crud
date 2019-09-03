@extends('layouts.master')

@section('content')
<div class="main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="right">
							<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>
								Tambah Data
							</button>
						</div>
						<h3 class="panel-title">Data Siswa</h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Nama Depan</th>
									<th>Nama Belakang</th>
									<th>Jenis Kelamin</th>
									<th>Agama</th>
									<th>Alamat</th>
									<th>Rata-Rata</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data_siswa as $siswa)
								<tr>
									<td><a href="/siswa/{{$siswa->id}}/profile">{{ $siswa->nama_depan }}</a></td>
									<td><a href="/siswa/{{$siswa->id}}/profile">{{ $siswa->nama_belakang }}</a></td>
									<td>{{ $siswa->jenis_kelamin }}</td>
									<td>{{ $siswa->agama }}</td>
									<td>{{ $siswa->alamat }}</td>
									<td>{{$siswa->ratanilai()}}</td>
									<td>
										<a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
										<a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau di Hapus..?')">Delete</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="/siswa/create" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group{{$errors->has('nama_depan') ? 'has-error' : ''}}">
						<label for="exampleInputEmail1">Nama Depan</label>
						<input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{old('nama_depan')}}">
						@if($errors->has('nama_depan'))
						<span class="halp-block">{{$errors->first('nama_depan')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Nama Belakang</label>
						<input name="nama_belakang" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Belakang" value="{{old('nama_belakang')}}">
					</div>
					<div class="form-group{{$errors->has('email') ? 'has-error' : ''}}">
						<label for="exampleInputPassword1">Email</label>
						<input value="{{old('email')}}" name="email" type="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
						@if($errors->has('email'))
						<span class="halp-block">{{$errors->first('email')}}</span>
						@endif
					</div>
					<div class="form-group{{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
						<label for="exampleFormControlSelect1">Jenis Kelamin</label>
						<select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
							<option value="">Pilih Jenis Kelamin</option>
							<option value="L"{{(old('jenis_kelamin')== 'L') ? 'selected' : ''}}>Laki-Laki</option>
							<option value="P"{{(old('jenis_kelamin') == 'P') ? 'selected' : ''}}>Perempuan</option>
						</select>
						@if($errors->has('jenis_kelamin'))
						<span class="halp-block">{{$errors->first('jenis_kelamin')}}</span>
						@endif
					</div>
					<div class="form-group{{$errors->has('agama') ? 'has-error' : ''}}">
						<label for="exampleInputPassword1">Agama</label>
						<input value="{{old('agama')}}" name="agama" type="text" class="form-control" id="exampleInputPassword1" placeholder="Agama">
						@if($errors->has('agama'))
						<span class="halp-block">{{$errors->first('agama')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Alamat</label>
						<textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>
					</div>
					<div class="form-group{{$errors->has('agama') ? 'has-error' : ''}}">
						<label for="exampleFormControlTextarea1">Avatar</label>
						<input type="file" name="avatar" class="form-control">
						@if($errors->has('avatar'))
						<span class="halp-block">{{$errors->first('avatar')}}</span>
						@endif
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>

		</div>
	</div>
</div>
@stop
