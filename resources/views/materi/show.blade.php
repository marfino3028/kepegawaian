@extends('layouts.index')
@section('content')
<div class="card shadow mb-4">

    @foreach ($ar_materi as $mat)
    <div class="card-header py-3" style="background-color: #A9A9A9">
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1cm; font-family: timesnewroman; text-align: center;">{{ $mat->nama }}</h6>
    </div>
    @endforeach
  </div>
  <div>
  <a rel="nofollow" href="{{ url('/materi') }}" 
       class="btn btn-primary btn-md">
        Kembali</a>
    </div>
@endsection