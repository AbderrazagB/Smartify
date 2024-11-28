@extends('layouts.app')
@section('content')
@if ($message = Session::get('success'))
  <div style="display: flex;" class="alert alert-success" role="alert">
   <p style="margin-left: auto; margin-right: auto; ">{{$message}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>

  </div>
  @endif
    <div class="main d-flex align-items-center">
  <div class="container-text impact w-50">
        <h1 class= "text-tittle" style="color: yellowgreen">Your Premier Electronics Destination!</h1>
        <p class= "text-subtittle " style="color: #ffffff; font-size: 18px;" >Discover a Universe of Innovation at Smartify, where cutting-edge electronics, from sleek laptops to immersive TVs, precision earphones to powerful smartphones, come together to enrich your life. Elevate your everyday with the latest gadgets and gear, and embrace the future you deserve.</p>

            <button type="button" class="btn-appointment btn"  onclick="location.href='{{ route('home') }}'">Browse Products</button>

  </div>

  <div id="carousel" class="carousel slide impact w-50" data-bs-ride="carousel">
    <div class="carousel-inner impact">
      <div class="carousel-item active">
        <div class="carousel-caption d-none d-md-block">
            <h5>Top performing gaming Pcs</h5>
            <p>Elevate your gaming adventures to new heights with our meticulously crafted selection of top-performing gaming PCs.</p>
          </div>
        <img src="{{asset('/storage/carousel/pc.png')}}" class="d-block w-100 h-100" alt="">

      </div>
      <div class="carousel-item">
        <img src="{{asset('/storage/carousel/phone.png')}}" class="d-block w-100" alt="">
        <div class="carousel-caption d-none d-md-block">
            <h5 >Wide variety of Smart phones</h5>
            <p>Step into a realm of technological wonder with our expansive collection of smartphones.</p>
          </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('/storage/carousel/tv.png')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5 >Best quality Tvs</h5>
            <p >Immerse yourself in the epitome of entertainment with our selection of best-quality TVs.</p>
          </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('/storage/carousel/headphones.png')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block" >
            <h5>Premium Headphones</h5>
            <p>Enrich Your Soundscape: Discover Premium Headphones for Every Beat.</p>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
