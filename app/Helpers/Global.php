<?php 

use App\Siswa;

function limabesar()
{
	$siswa = Siswa::all();
	$siswa->map(function($satusiswa){
		$satusiswa->ratanilai = $satusiswa->ratanilai();
		return $satusiswa;
	});
	$siswa = $siswa->sortByDesc('ratanilai')->take(5);
	return $siswa;
} 
?>