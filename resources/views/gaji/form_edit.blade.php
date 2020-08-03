@extends('layouts.index')
@section('content')
@php
$ar_pegawai = App\Pegawai::all();
@endphp

@foreach ($data as $edit)
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{route('gaji.update',$edit->id)}}" enctype="multipart/form-data">
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
    <label for="gapok" class="col-4 col-form-label">Gapok</label> 
    <div class="col-8">
      <input id="gapok" name="gapok" type="text" class="form-control"  value="{{ ($edit->gapok) }}" />
    </div>
  </div>

  <div class="form-group row">
    <label for="tunjab" class="col-4 col-form-label">Tunjab</label> 
    <div class="col-8">
      <input id="tunjab" name="tunjab" type="text" class="form-control"  value="{{ $edit->tunjab }}" />
    </div>

  </div>
  <div class="form-group row">
    <label for="tunjab" class="col-4 col-form-label">Bpjs</label> 
    <div class="col-8">
      <input id="bpjs" name="bpjs" type="text" class="form-control"  value="{{ $edit->bpjs }}" />
    </div>
  </div>

  <div class="form-group row">
    <label for="tunjab" class="col-4 col-form-label">Bonus</label> 
    <div class="col-8">
      <input id="bonus" name="bonus" type="text" class="form-control"  value="{{ $edit->bonus }}" />
    </div>
  </div>

  <div class="form-group row">
    <div class="offset-4 col-8">  
      
       <button name="proses" type="submit" class="btn btn-secondary" 
      value="ubah"><i class="fas fa-pen"></i>&nbsp;Ubah</button>
   
      <input type="hidden" name="id" value="{{ $edit->id }}">
       <a rel="nofollow" href="{{ url('/gaji') }}" 
       class="btn btn-primary btn-md">
        Kembali</a>
    </div>
  </div>
</form>
@endforeach
@endsection