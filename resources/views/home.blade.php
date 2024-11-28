@extends('layouts.app')
@section('content')

<section class="section-products">
    <div class="container">
        <div class="row justify-content-center text-center">
      <h4 class="mt-4 mb-5"><strong style="color: yellowgreen">Products:</strong></h4>
    </div>
      <div class="row">
      @foreach ($products as $item)


      <div class="col-md-6 col-lg-4 col-xl-3 ">
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




        {{-- <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100" >
            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
              data-mdb-ripple-color="light">
              <img src="{{ asset('/storage/images/'. $item->pic) }}"
                class="w-50"  />
            </div>
            <div class="card-body">
                <h2 class="card-title mb-3">{{$item->name}}</h2>
                <p>{{$item->category}}</p>
              <h6 class="mb-3">{{$item->price}} DT</h6>

            </div>
            <div class="d-flex flex-column mt-4">
                <a class="btn btn-primary btn-sm" type="button" href="{{route('manageProduct.show',$item->id)}}">More Details</a>
                <a class="btn btn-outline-primary btn-sm mt-2" type="button" href="{{route('addCart', ['id' => $item->id])}}">Add to Cart</a>
              </div>
          </div>
        </div> --}}


      @endforeach
    <div class="pagination justify-content-center "> {!!  $products->links()   !!}</div>
    </div>
    </div>


  </section>

@endsection
