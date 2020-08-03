@extends('layouts.index')
@section('content')
<div class="card shadow mb-4">
    @foreach ($ar_pegawai as $peg)
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">{{ $peg->nama }}</h6>
    </div>
    <div class="card-body">
      <div class="text-center">
        @if(!empty($peg->foto))
          <img id="poto" class="img-fluid img-thumbnail" src="{{asset('img/'.$peg->foto)}}">
        @else
          <img id="poto" class="img-fluid img-thumbnail" src="{{asset('img/no-photo.png')}}" >
        @endif
      </div>
      <div class="alert alert-dismissable alert-primary">
          NIP : {{ $peg->nip }} <br/>
          Nama : {{ $peg->nama }} <br/>
          Jenis Kelamin : {{ $peg->gender }} <br/>
          Tempat Lahir : {{ $peg->tempat_lahir }} <br/>
          Tanggal Lahir : {{ $peg->tanggal_lahir }} <br/>
          Kategori Pegawai : {{ $peg->jenis }} <br/>
          Jabatan : {{ $peg->posisi }} <br/>
          Divisi : {{ $peg->bagian }} <br/>
          Alamat : {{ $peg->alamat }} <br/>
          HP : {{ $peg->hp }} <br/>
          Email : {{ $peg->email }}
      </div>
      @endforeach
    <a rel="nofollow" href="{{ url('/pegawai') }}" 
       class="btn btn-primary btn-md">
        Kembali</a>
    </div>
  </div>
@endsection