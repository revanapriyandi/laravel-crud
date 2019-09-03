@extends('layouts.master')

@section ('content')
<div class="main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Edit</h3>
					</div>
					<div class="panel-body">
						<form method="POST" action="/siswa/{{$siswa->id}}/update" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Depan</label>
								<input name="nama_depan" type="text" value="{{$siswa->nama_depan}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Nama Belakang</label>
								<input name="nama_belakang" type="text" value="{{$siswa->nama_belakang}}" class="form-control" id="exampleInputPassword1" placeholder="Nama Belakang">
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Jenis Kelamin</label>
								<select name="jenis_kelamin"  class="form-control" id="exampleFormControlSelect1">
									<option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
									<option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Agama</label>
								<input name="agama" value="{{$siswa->agama}}" type="text" class="form-control" id="exampleInputPassword1" placeholder="Agama">
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Alamat</label>
								<textarea name="alamat"class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->alamat}}</textarea>
							</div>

							<div class="form-group">
								<label for="exampleFormControlTextarea1">Avatar</label>
								<input type="file" name="avatar" class="form-control">
							</div>

							<button type="submit" name="submit" class="btn btn-warning btn-block float-right">Update</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
