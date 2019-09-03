@extends('layouts.master')

@section('content')
<div class="main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Ranking 5 Besar</h3>
					</div>
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Rank</th>
									<th>Nama</th>
									<th>Nilai</th>
								</tr>
							</thead>
							<tbody>
								@php
								$ranking = 1;
								@endphp
								@foreach(limabesar() as $siswa)
								<tr>
									<td>{{$ranking++}}</td>
									<td>{{$siswa->namalengkap()}}</td>
									<td>{{$siswa->ratanilai()}}</td>
								</tr>
								@endforeach
								@php
								$ranking++;
								@endphp
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop