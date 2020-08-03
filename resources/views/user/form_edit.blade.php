@extends('layouts.index')
@section('content')
@php
$ar_user = App\User::all();
$ar_data = ['administrator','kepsek','guru','staff'];
@endphp
@foreach($data as $edit)
<form method="POST" action="{{route('user.update',$edit->id)}}">
  @csrf
  @method('PUT')
   <div class="form-group row">
    <label for="name" class="col-4 col-form-label">Username</label> 
    <div class="col-8">
      <input  name="name" type="text" class="form-control" value="{{ $edit->name }}" />
      @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>

 <div class="form-group row">
    <label for="email" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input name="email" value="{{ $edit->email }}" type="email" class="form-control">
     @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>

<div class="form-group row">
    <label class="col-4 col-form-label">Role</label> 
    <div class="col-8">
      <select name="role" class="custom-select">
        <option value="">-- Role --</option>
        @foreach ($ar_data as $dat) 
        <option value="{{ $dat }}" @if (old('role') == $dat) @endif> {{ $dat }} </option>
        @endforeach
      </select>
     @error('role')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
 
 <!--div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Fotonya</label> 
    <div class="col-8">
      <input id="foto" value="{{ $edit->foto }}" name="foto" type="file" class="form-control-file">
    </div>
  </div--> 
  <div class="form-group row">
   <div class="offset-4 col-8">
     <div>
 <button name="proses" type="submit" class="btn btn-secondary" 
      value="ubah"><i class="fas fa-pen"></i>&nbsp;Ubah</button>
 </div>
</div>
</div>

</form>
@endforeach
@endsection