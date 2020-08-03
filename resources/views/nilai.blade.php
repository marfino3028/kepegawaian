@php
$no = 1;
$s1 = ['nama'=>'Garox', 'nilai'=>78];
$s2 = ['nama'=>'Hideung', 'nilai'=>99];
$s3 = ['nama'=>'Maman', 'nilai'=>69];
$s4 = ['nama'=>'Juned', 'nilai'=>10];
$ar_santri = [$s1,$s2,$s3,$s4];
$ar_judul = ['No', 'Nama', 'Nilai', 'Keterangan'];
@endphp
<h3 align="center">Daftar Nilai Santri</h3>
<table border="1" align="center" width="40%" cellpadding="10">
	<thead>
		<tr bgcolor="pink">
			@foreach ($ar_judul as $judul)
			<th>{{$judul}}</th>
			@endforeach
		</tr>
	</thead>
	<tbody>
		@foreach ($ar_santri as $santri)
		{{-- uji kelulusan --}}
		@php
			$ket = ($santri['nilai']>= 60) ? 'Lulus' : 'Gagal';
		@endphp
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $santri['nama']}}</td>
			<td>{{ $santri['nilai']}}</td>
			<td>{{ $ket }}</td>
		</tr>
		@endforeach
	</tbody>
</table>