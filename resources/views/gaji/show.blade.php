@extends('layouts.index')
@section('content')

<div class="card shadow mb-4">
    @foreach ($ar_gaji as $gaj)
    
     <div class="card-header py-3 text-left">
      <label>Gapok&nbsp;&nbsp;:&nbsp; {{number_format ($gaj->gapok) }}</label>
    </div>
    <div class="card-header py-3 text-left">
      <label>Tunjangan&nbsp;&nbsp;:&nbsp; {{number_format ($gaj->tunjab) }}</label>
    </div>
    <div class="card-header py-3 text-left">
      <label>BPJS&nbsp;&nbsp;:&nbsp; {{number_format ($gaj->bpjs) }}</label>
    </div>
    <div class="card-header py-3 text-left">
      <label>Bonus&nbsp;&nbsp;:&nbsp; {{number_format ($gaj->bonus) }}</label>
    </div>
    @endforeach
      
  </div>
   <div>
    <a rel="nofollow" href="{{ url('/gaji') }}" 
       class="btn btn-primary btn-md">
        Kembali</a>
   </div>
@endsection