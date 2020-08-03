@extends('layouts.index')
@section('content')
<div class="card shadow mb-4">
    @foreach ($ar_divisi as $div)
    <div class="card-header py-3 text-center">
      <h6 class="m-0 font-weight-bold text-primary">{{ $div->nama }}</h6>
    </div>
    @endforeach
  </div>
@endsection