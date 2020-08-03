@php

$ar_pegawai = App\Pegawai::all();
@endphp
<form method="POST" action="{{route('gaji.store')}}"
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
    <label for="gapok" class="col-4 col-form-label">Gaji Pokok</label> 
    <div class="col-8">
      <input id="gapok" name="gapok" type="text" class="form-control" required="required" value="" />
    </div>
  </div>

  <div class="form-group row">
    <label for="tunjab" class="col-4 col-form-label">Tunjangan Jabatan</label> 
    <div class="col-8">
      <input id="tunjab" name="tunjab" type="text" class="form-control" required="required" value="" />
    </div>
  </div>

  <div class="form-group row">
    <label for="bpjs" class="col-4 col-form-label">BPJS</label> 
    <div class="col-8">
      <input id="bpjs" name="bpjs" type="text" class="form-control" required="required" value="" />
    </div>
  </div>

  <div class="form-group row">
    <label for="bonus" class="col-4 col-form-label">Bonus</label> 
    <div class="col-8">
      <input id="bonus" name="bonus" type="text" class="form-control" required="required" value="" />
    </div>
  </div>

  <div class="form-group row">
    <div class="offset-4 col-8">  
      <button name="proses" type="submit" class="btn btn-primary" 
      value="simpan">Simpan</button>
    </div>
  </div>
</form>