@extends('layouts.index')
@section('content')
@php
//array scalar
$ar_gender = ['L'=>'Laki-Laki', 'P'=>'Perempuan'];
//ambil master data
$ar_kategori = App\Kategori::all();
$ar_jabatan = App\Jabatan::all();
$ar_divisi = App\Divisi::all();
@endphp
@foreach ($data as $edit)

<form method="POST" action="{{route('pegawai.update',$edit->id)}}" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="form-group row">
        <label for="nip" class="col-4 col-form-label">NIP</label> 
        <div class="col-8">
          <input id="nip" name="nip" type="text"class="form-control" value="{{ $edit->nip }}" />
        </div>
  </div> 

  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Pegawai</label> 
    <div class="col-8">
      <input id="nama" name="nama" type="text" class="form-control" value="{{ $edit->nama }}" />
    </div>
  </div>

<div class="form-group row">
    <label for="gridRadios" class="col-4">Gender</label>
    <div class="col-8">
      <div class="custom-control-inline">
         @php
         $no = 0;
         @endphp
         @foreach ($ar_gender as $k => $v)
         @php
         $cek = ($edit->gender == $k) ? 'checked' : '';
         @endphp
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jk" value="{{ $k }}" {{ $cek }} />
          <label class="form-check-label">
            {{ $v }}
          </label> 
        </div>
        @endforeach
      </div>
    </div>
</div>

  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Tempat Lahir</label> 
    <div class="col-8">
      <input id="nama" name="tempat" type="text" class="form-control" value="{{ $edit->tempat_lahir }}" />
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Tanggal Lahir</label> 
    <div class="col-8">
      <input id="nama" name="tanggal" type="date" class="form-control" value="{{ $edit->tanggal_lahir }}" />
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4 col-form-label">Kategori</label> 
    <div class="col-8">
      <select name="kategori" class="custom-select">
        <option value="">-- Pilih Kategori Pegawai --</option>
        @foreach ($ar_kategori as $kat)
        {{ $cell = ($kat['id'] == $edit->kategori_id) ? 'selected' : '' }}   
        <option value="{{ $kat['id'] }}" {{ $cell }}> {{ $kat['nama'] }} </option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4 col-form-label">Jabatan</label> 
    <div class="col-8">
      <select name="jabatan" class="custom-select">
        <option value="">-- Pilih Jabatan --</option>
        @foreach ($ar_jabatan as $jab) 
        {{ $cell = ($jab['id'] == $edit->jabatan_id) ? 'selected' : '' }}  
        <option value="{{ $jab['id'] }}" {{ $cell }}> {{ $jab['nama'] }} </option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4 col-form-label">Divisi</label> 
    <div class="col-8">
      <select name="divisi" class="custom-select">
        <option value="">-- Pilih Divisi --</option>
        @foreach ($ar_divisi as $div) 
        {{ $cell = ($div['id'] == $edit->divisi_id) ? 'selected' : '' }}  
        <option value="{{ $div['id'] }}" {{ $cell }}> {{ $div['nama'] }} </option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-4 col-form-label">Alamat</label> 
    <div class="col-8">
      <textarea id="alamat" name="alamat" cols="40" rows="5" class="form-control">{{ $edit->alamat }}</textarea>
    </div>
  </div>

  <div class="form-group row">
    <label for="hp" class="col-4 col-form-label">HP</label> 
    <div class="col-8">
      <input id="hp" name="hp" value="{{ $edit->hp }}" type="text" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="email" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="email" name="email" value="{{ $edit->email }}" type="email" class="form-control">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input value="{{ $edit->foto }}" name="foto" type="file" class="form-control-file">
    </div>
  </div> 
  <div class="form-group row">

    <div class="offset-4 col-8">
     <div>
 
       <button name="proses" type="submit" class="btn btn-secondary" 
      value="ubah"><i class="fas fa-pen"></i>&nbsp;Ubah</button>&nbsp;&nbsp;&nbsp;
    <a rel="nofollow" href="{{ url('/pegawai') }}" 
       class="btn btn-primary btn-md">
        Kembali</a>
    </div>
  </div>
</form>
@endforeach
@endsection