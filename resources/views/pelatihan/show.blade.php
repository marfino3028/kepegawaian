@extends('layouts.index')
@section('content')
<div class="card shadow mb-4">
    @foreach ($ar_pelatihan as $pel)
     <div class="card-header py-3" style="background-color: #A9A9A9">
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1cm; font-family: timesnewroman; text-align: center;">{{ $pel->tema }}</h6>
    </div>
    <div class="card-header py-3 text-left">
      <label>Nama&nbsp;&nbsp;:&nbsp; {{ $pel->nama }}</label>
    </div>
     <div class="card-header py-3 text-left">
      <label>Materi&nbsp;&nbsp;:&nbsp; {{ $pel->tema }}</label>
    </div>
    <div class="card-header py-3 text-left">
      <label>Tempat Pelaksanaan&nbsp;&nbsp;:&nbsp; {{ $pel->tempat }}</label>
    </div>
    <div class="card-header py-3 text-left">
      <label>Tanggal Mulai&nbsp;&nbsp;:&nbsp; {{ $pel->tgl_mulai }}</label>
    </div>
    <div class="card-header py-3 text-left">
      <label>Tanggal Akhir&nbsp;&nbsp;:&nbsp; {{ $pel->tgl_akhir }}</label>
    </div>
    <div class="card-header py-3 text-left">
      <label>Keterangan&nbsp;&nbsp;:&nbsp; {{ $pel->keterangan }}</label>
    </div>
    @endforeach
  </div>
  <div>
    <a rel="nofollow" href="{{ url('/pelatihan') }}" 
       class="btn btn-primary btn-md">
        Kembali</a>
    </div>
@endsection