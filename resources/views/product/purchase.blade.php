@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="col-md-4">
        <div class="border border-3 border-success"></div>
        <div class="card  bg-white shadow pb-3">
            <div class="mb-4 text-center">
                <img src="{{asset('/storage/purchase/delivery.gif')}}" class="img-fluid w-60" alt="No Gif">

            </div>
            <div class="text-center">
                <h2>Thank You For Your Purchase!</h2>
                <p>Your products will arrive in two days.</p>
                <a href="{{route('home')}}"><button class="btn btn-outline-success">Back Home</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
