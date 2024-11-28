@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card pcard" >
                @if ($product->qntStock > 0)
                    <span class="new">In Stock</span>
                @else
                     <span class="new" style="background: rgba(255, 0, 0, 0.63)">Out of Stock</span>
                @endif

                <div style="display: flex; justify-content: center;"><img src="{{ asset('/storage/images/'. $product->pic) }}" class="card-img-top" style="width: 300px"></div>
                <div class="card-body">
                    <h3 class="card-header tw">
                        {{$product ->name}}
                    </h3>
                <p class="card-text tw">{{$product ->details}}</p>
                <hr>
                <h3 class="list-group-item tw">Price: <span style="float: right">{{$product ->price }}DT</span></h3>
                </div>
                <div class="card-body">
                @if ($product->qntStock > 0 &&(Auth::guest()||!(Auth::user()->isAdmin)))
                <div class="row" style="float: right;">
                    <a href="{{route('addCart', ['id' => $product->id])}}"><i class="fa fa-shopping-cart ct fa-2x"></i></a>
                </div>
                @elseif ((Auth::check()&&(Auth::user()->isAdmin)))
                <div class="row" style="float: right;">
                    <a href="{{route('manageProduct.edit',$product->id)}} "><i class="fa fa-gear ct fa-2x"></i></a>
                </div>
                @endif
                <div class="col align-self-start">
                    <a   class="btn b1" href="{{route('home')}}" >Back</a>
                   </div>
            </div>

        </div>

    </div>
</div>


@endsection
