@extends('layouts.master')
@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-profile">
				<div class="clearfix">
					<!-- LEFT COLUMN -->
					<div class="profile-left">
						<!-- PROFILE HEADER -->
						<div class="profile-header">
							<div class="overlay"></div>
							<div class="profile-main">
								<img src="" class="img-circle" width="150" height="150" alt="Avatar">
								<h3 class="name">{{$guru->nama}}</h3>
								<span class="online-status status-available">Available</span>
							</div>
						</div>
						<!-- END PROFILE HEADER -->
					</div>
				</div>
				<!-- END LEFT COLUMN -->
				<!-- RIGHT COLUMN -->
				<div class="clearfix">
					<div class="profile-right">
						<!-- TABBED CONTENT -->
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Mata Pelajaran Yang di Ajar {{$guru->nama}}</h3>
							</div>
							<div class="panel-body">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Nama</th>
											<th>Semester</th>
										</tr>
									</thead>
									<tbody>
										@foreach($guru->mapel as $mapel)
										<tr>
											<td>{{$mapel->nama}}</td>
											<td>{{$mapel->semester}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
				<!-- END RIGHT COLUMN -->
			</div>

		</div>
	</div>
</div>
<!-- END MAIN CONTENT -->
</div>
<!-- Button trigger modal -->



@stop
