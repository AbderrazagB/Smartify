@extends('layouts.app')
@section('content')

<section class="section-products">
    <div class="container">
        @if ($products->isEmpty())

        <div class="d-flex justify-content-center align-items-center">


                    <div class="mb-4 text-center">
                        <img src="{{asset('/storage/purchase/search.png')}}" class="img-fluid w-50 h-50" alt="No Gif">

                    </div>

        </div>
        <div class="row justify-content-center text-center">
            <h4 class="mt-4 mb-5">We couldn't find the product that you were looking for!</h4>
          </div>
        <div class="text-center">
            <a href="{{route('home')}}"><button class="btn btn-outline-dark">Return Back</button></a>
        </div>


        @else
        <div class="row justify-content-center text-center">
            <h4 class="mt-4 mb-5" ><strong style="color: yellowgreen">Products:</strong></h4>
          </div>
            <div class="row">
            @foreach ($products as $item)


            <div class="col-md-6 col-lg-4 col-xl-3">
            <div id="product-4" class="single-product justify-content-center text-center">

              <div class="part-1 " >
                @if ($item->qntStock > 0)
                <span class="new">In Stock</span>
                @else
                <span class="new" style="background: rgba(255, 0, 0, 0.63)">Out of Stock</span>
                @endif
                 <img src="{{ asset('/storage/images/'. $item->pic) }}" class="w-100" />
                     <ul>
                         @if ($item->qntStock > 0 &&(Auth::guest()||!(Auth::user()->isAdmin)))
                             <li><a href="{{route('addCart', ['id' => $item->id])}}"><i class="fa fa-shopping-cart"></i></a></li>
                         @endif
                             <li><a href="{{route('manageProduct.show',$item->id)}}"><i class="fa fa-expand"></i></a></li>
                     </ul>
              </div>
              <div class="part-2">
                      <h3 class="product-title">{{$item->name}}</h3>
                      <h4 class="product-price">{{$item->price}} DT</h4>
              </div>
          </div>

      </div>

            @endforeach
            <div class="pagination justify-content-center "> {!!  $products->appends($_GET)->links()   !!}</div>
          </div>
        @endif
    </div>

  </section>

@endsection
