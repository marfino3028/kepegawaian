 @php
$ar_data = ['administrator','kepsek','guru','staff'];

@endphp
<form method="POST" action="{{route('user.store')}}">
  @csrf 
  <div class="form-group row">
    <label for="name" class="col-4 col-form-label">Username</label> 
    <div class="col-8">
       <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" />
      @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>

   <div class="form-group row">
    <label for="email" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
       <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" />
       @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="password" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" />
      @error('password')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>

 <div class="form-group row">
    <label class="col-4 col-form-label">Role</label> 
    <div class="col-8">
      <select name="role" class="custom-select @error('role') is-invalid @enderror">
        <option value="">-- Role --</option>
        @foreach ($ar_data as $dat) 
        <option value="{{ $dat }}" @if (old('role') == $dat) selected @endif> {{ $dat }} </option>
        @endforeach
      </select>
      @error('role')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <!--div class="form-group row">
    <label class="col-4">Foto</label> 
    <div class="col-8">
    <input value="{{  old('foto') }}" name="foto" type="file" 
       class="form-control-file @error('foto') is-invalid @enderror">
       @error('foto')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror 
    </div>
  </div-->  

  <div class="form-group row">
    <div class="offset-4 col-8">  
      <button name="proses" type="submit" class="btn btn-primary" 
      value="simpan">Registrasi</button>
    </div>
  </div>
</form>
