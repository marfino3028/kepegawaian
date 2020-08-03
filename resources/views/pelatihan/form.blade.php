@php

$ar_pegawai = App\Pegawai::all();
$ar_materi = App\Materi::all();


@endphp
<form method="POST" action="{{ route('pelatihan.store')}}"
      enctype="multipart/form-data"> 
   @csrf 
 
   <div class="form-group row">
    <label class="col-4 col-form-label">Pegawai</label> 
    <div class="col-8">
      <select name="nama" class="custom-select @error('nama') is-invalid @enderror">
        <option value="">-- Pilih Pegawai --</option>
        @foreach ($ar_pegawai as $peg) 
        <option value="{{ $peg['id'] }}" @if (old('nama') == $peg['id']) selected @endif> {{ $peg['nama'] }} </option>
        @endforeach
      </select>
      @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
 

    <div class="form-group row">
    <label class="col-4 col-form-label">Materi</label> 
    <div class="col-8">
      <select name="tema" class="custom-select @error('tema') is-invalid @enderror">
        <option value="">-- Pilih Materi --</option>
        @foreach ($ar_materi as $mat) 
        <option value="{{ $mat['id'] }}" @if (old('tema') == $mat['id']) selected @endif> {{ $mat['nama'] }} </option>
        @endforeach
      </select>
      @error('tema')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="tempat" class="col-4 col-form-label">Tempat Pelaksanaan</label> 
    <div class="col-8">
      <input name="tempat" type="text" class="form-control @error('tempat') is-invalid @enderror" value="{{ old('tempat') }}" />
      @error('tempat')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="tgl_mulai" class="col-4 col-form-label">Tanggal Mulai</label> 
    <div class="col-8">
      <input name="tgl_mulai" type="date" class="form-control @error('tgl_mulai') is-invalid @enderror" value="{{ old('tgl_mulai') }}" />
      @error('tgl_mulai')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>

   <div class="form-group row">
    <label for="tgl_akhir" class="col-4 col-form-label">Tanggal Akhir</label> 
    <div class="col-8">
      <input name="tgl_akhir" type="date" class="form-control @error('tgl_akhir') is-invalid @enderror" value="{{ old('tgl_akhir') }}" />
      @error('tgl_akhir')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  
  <div class="form-group row">
     <label for="keterangan" class="col-4 col-form-label">Keterangan</label> 
    <div class="col-8">
      <textarea id="keterangan" name="keterangan" cols="40" rows="5" class="form-control"></textarea>
    </div>
  </div>

   <div class="form-group row">
    <div class="offset-4 col-8">  
      <button name="proses" type="submit" class="btn btn-primary" 
      value="simpan">Simpan</button>
    </div>
  </div>
</form>
