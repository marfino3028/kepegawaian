  
@extends('layouts.index')
@section('content')
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}
#myImg:hover {opacity: 0.7;}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}
/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}
/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 100%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}
/* Add Animation */
.modal-content, #caption {
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}
@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)}
  to {-webkit-transform:scale(1)}
}
@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}
/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}
.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<div class="card shadow mb-10">
   <div class="card-header py-3" style="background-color: #A9A9A9">
  <center> <h3 class="m-0 font-weight-bold text-primary" style="font-size: 1cm; font-family: timesnewroman; text-align: center;">{{Auth::user()->name}}</h3></center>
    </div>

    <div class="card-body">
        <div class="text-center">
            @if(!empty(Auth::user()->foto))
                <img id="myImg" style="width:400px;"
                     src="{{asset('img')}}/{{Auth::user()->foto}}" />
            @else
                <img  style="width:400px;"
                     src="{{asset('img/no-photo.png')}}" alt="">
            @endif
    
      <div class="alert alert-dismissable alert-success">
        <br/>        
 <center>
<table style="width:25%; font-size: 7mm;" >
  <tr>
    <td>Nama</td>
    <td>:&nbsp;{{Auth::user()->name}}</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>:&nbsp;{{Auth::user()->email}}</td>
  </tr>
  <tr>
    <td>Role</td>
    <td>:&nbsp;{{Auth::user()->role}}</td>
  </tr>
</table><br/>
        <a rel="nofollow" href="{{ route('profile.edit', Auth::user()->id) }}" class="btn btn-warning btn-sm">
          <i class="fas fa-pen"></i>&nbsp;&nbsp;Edit Profil</a> 

       </center>



          </div>
        <div>
      </div>
    
    </div>
<a rel="nofollow" href="{{ url('/home') }}" class="btn btn-primary btn-md">Kembali</a>
</div>
</div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        </script>
@endsection