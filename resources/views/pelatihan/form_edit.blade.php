@extends('layouts.index')
@section('content')
@php
$ar_pegawai = App\Pegawai::all();
$ar_materi = App\Materi::all();
@endphp
@foreach ($data as $edit)

<form method="POST" action="{{route('pelatihan.update',$edit->id)}}" enctype="multipart/form-data">
  @csrf
  @method('PUT')

<div class="form-group row">
    <label class="col-4 col-form-label">Pegawai</label> 
    <div class="col-8">
      <select name="nama" class="custom-select">
        <option value="">-- Pilih Pegawai --</option>
        @foreach ($ar_pegawai as $peg) 
        {{ $cell = ($peg['id'] == $edit->pegawai_id) ? 'selected' : '' }}  
        <option value="{{ $peg['id'] }}" {{ $cell }}> {{ $peg['nama'] }} </option>
        @endforeach
      </select>
    </div>
  </div>
 
    <div class="form-group row">
    <label class="col-4 col-form-label">Materi</label> 
    <div class="col-8">
      <select name="tema" class="custom-select">
        <option value="">-- Pilih Materi --</option>
        @foreach ($ar_materi as $tema) 
        {{ $cell = ($tema['id'] == $edit->materi_id) ? 'selected' : '' }}  
        <option value="{{ $tema['id'] }}" {{ $cell }}> {{ $tema['nama'] }} </option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="tempat" class="col-4 col-form-label">Tempat Pelaksanaan</label> 
    <div class="col-8">
      <input name="tempat" type="text" class="form-control" value="{{ ($edit->tempat) }}" />
      @error('tempat')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

  </div>
  <div class="form-group row">
    <label for="tgl_mulai" class="col-4 col-form-label">Tanggal Mulai</label> 
    <div class="col-8">
      <input name="tgl_mulai" type="date" class="form-control" value="{{ ($edit->tgl_mulai) }}" />
      @error('tgl_mulai')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>

   <div class="form-group row">
    <label for="tgl_akhir" class="col-4 col-form-label">Tanggal Akhir</label> 
    <div class="col-8">
      <input name="tgl_akhir" type="date" class="form-control" value="{{ ($edit->tgl_akhir) }}" />
      @error('tgl_akhir')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  
   <div class="form-group row">
     <label for="keterangan" class="col-4 col-form-label">Keterangan</label> 
    <div class="col-8">
      <textarea id="keterangan" name="keterangan" cols="40" rows="5" class="form-control">{{ $edit->keterangan }}</textarea>
    </div>
  </div>

  <div class="form-group row">
    <div class="offset-4 col-8">  
       <button name="proses" type="submit" class="btn btn-secondary" 
      value="ubah"><i class="fas fa-pen"></i>&nbsp;Ubah</button>&nbsp;&nbsp;&nbsp;
    <a rel="nofollow" href="{{ url('/pelatihan') }}" 
       class="btn btn-primary btn-md">
        Kembali</a>
    </div>
    </div>
</form>
@endforeach
@endsection