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
<form method="POST" action="{{route('pegawai.store')}}"
      enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
        <label class="col-4 col-form-label">NIP</label> 
        <div class="col-8">
          <input name="nip" type="text" 
        class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}" />
        @error('nip')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        


  </div>  
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Pegawai</label> 
    <div class="col-8">
      <input id="nama" name="nama" type="text" 
      class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" />
      @error('nama')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Jenis Kelamin</label> 
    <div class="col-8">
      @php
      $no = 0;
      @endphp
      @foreach ($ar_gender as $k => $v)  
      <div class="form-check form-check-inline @error('jk') is-invalid @enderror">
        <input class="form-check-input" type="radio" name="jk" 
               value="{{ $k }}" @if (old('jk') == $k) checked @endif/>
        <label class="form-check-label">{{ $v }}</label>
      </div>
      @endforeach
      @error('jk')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Tempat Lahir</label> 
    <div class="col-8">
      <input name="tempat" type="text" class="form-control @error('tempat') is-invalid @enderror" value="{{ old('tempat') }}" />
      @error('tempat')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Tanggal Lahir</label> 
    <div class="col-8">
      <input name="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}" />
      @error('tanggal')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4 col-form-label">Kategori</label> 
    <div class="col-8">
      <select name="kategori" class="custom-select @error('kategori') is-invalid @enderror">
        <option value="">-- Pilih Kategori Pegawai --</option>
        @foreach ($ar_kategori as $kat) 
          <option value="{{ $kat['id'] }}" @if (old('kategori') == $kat['id']) selected @endif> {{ $kat['nama'] }} </option>
        @endforeach
      </select>
      @error('kategori')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4 col-form-label">Jabatan</label> 
    <div class="col-8">
      <select name="jabatan" class="custom-select @error('jabatan') is-invalid @enderror">
        <option value="">-- Pilih Jabatan --</option>
        @foreach ($ar_jabatan as $jab) 
        <option value="{{ $jab['id'] }}" @if (old('jabatan') == $jab['id']) selected @endif> {{ $jab['nama'] }} </option>
        @endforeach
      </select>
      @error('jabatan')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4 col-form-label">Divisi</label> 
    <div class="col-8">
      <select name="divisi" class="custom-select @error('jabatan') is-invalid @enderror">
        <option value="">-- Pilih Divisi --</option>
        @foreach ($ar_divisi as $div) 
        <option value="{{ $div['id'] }}" @if (old('divisi') == $div['id']) selected @endif> {{ $div['nama'] }} </option>
        @endforeach
      </select>
      @error('divisi')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-4 col-form-label">Alamat</label> 
    <div class="col-8">
      <textarea id="alamat" name="alamat" cols="40" rows="5" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
      @error('alamat')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="hp" class="col-4 col-form-label">HP</label> 
    <div class="col-8">
      <input id="hp" name="hp" value="{{ old('hp') }}" type="text" class="form-control @error('hp') is-invalid @enderror">
      @error('hp')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input name="email" type="text" 
      class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" />
      @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  
  <div class="form-group row">
    <label class="col-4">Foto</label> 
    <div class="col-8">
    <input value="{{  old('foto') }}" name="foto" type="file" 
       class="form-control-file @error('foto') is-invalid @enderror">
       @error('foto')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror 
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">  
      <button name="proses" type="submit" class="btn btn-primary" 
      value="simpan">Simpan</button>
    </div>
  </div>
</form>
@endsection