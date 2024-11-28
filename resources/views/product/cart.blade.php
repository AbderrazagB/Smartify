@extends('layouts.app')
@section('content')
<section class="h-100 gradient-custom">
    <div class="container">
      <div class="row d-flex justify-content-center my-4">
        <div class="col-md-8">
          <div class="card mb-4 text-white bg-dark bg-gradient bg-opacity-10 border-bottom-0">
            <div class="card-header py-3">
              <h5 class="mb-0">Cart - {{count($products)}} Items</h5>
            </div>
            <div class="card-body">
                @foreach ($products as $product )

              <!-- Single item -->
              <div class="row" onload="cart()">
                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                  <!-- Image -->
                  <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                    <img src="{{ asset('/storage/images/'. $product->produit->pic) }}"
                      class="w-100" alt="Blue Jeans Jacket" />
                    <a href="#!">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                    </a>
                  </div>
                  <!-- Image -->
                </div>

                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                  <!-- Data -->
                  <p><strong>{{$product->produit->name}}</strong></p>
                  <p>Category: {{$product->produit->category}}</p>
                  <p>Price: <span id="num1">{{$product->produit->price}}</span> DT</p>
                  <form action="{{ route('DeleteFromCart', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                            data-mdb-toggle="tooltip" title="Remove item">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </form>
                  <!-- Data -->
                </div>

                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                  <!-- Quantity -->
                  <form action="{{route('Carts.update',$product->id)}}" method="post">
                    @csrf
                    @method('PUT')
                  <div class="d-flex mb-4" style="max-width: 300px">
                    <a class="btn btn-primary me-2 h-25 d-inline-block "
                      onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                      <i class="fa fa-minus" aria-hidden="true"></i>
                  </a>

                    <div class="form-outline">
                      <input id="form1" min="1" name="qnt" value="{{$product->qnt}}" type="number" class="form-control" />
                      <label class="form-label" for="form1">Quantity</label>
                    </div>

                    <a class="btn btn-primary ms-2 h-25 d-inline-block"
                      onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                      <i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                    <div class="gap-3 d-md-flex justify-content-md-end text-center ms-2">
                        <button type="submit" class="btn btn-dark h-50 d-inline-block " >Confirm</button>

                    </div>
                      </div>
                </form>

                  <!-- Quantity -->

                  <!-- Price -->
                  <p class="text-start text-md-center">
                    <div class="item-price-display"><span id="qtt" class="qtt"></span> DT</div>
                  </p>
                  <!-- Price -->
                </div>
              </div>
              <hr>
              <br>
              <!-- Single item -->
              @endforeach
            </div>
          </div>
          <div class="col align-self-start" >
            <a style="float: left;"  class="btn b1 mb-2" href="{{route('home')}}" >Home</a>
        </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 text-white bg-dark bg-gradient bg-opacity-10 border-bottom-0">
            <div class="card-header py-3">
              <h5 class="mb-0">Summary</h5>
            </div>
            <div class="card-body">
              <ul class="p-0">
                <li
                  class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                  Products
                  <span id="priceProducts"></span>
                </li>
                <br>
                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                  Shipping
                  <span>7 dt</span>
                </li>
                <br>
                <li
                  class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                  <div>
                    <strong>Total amount</strong>
                  </div>
                  <span><strong id="totalAmount" ></strong></span>
                </li>
              </ul>
              @if (!($products->isEmpty()))
              <a href="{{route('Purchase',['cart_ids' => $cartIds])}}">
                <button type="button" class="btn b1 btn-lg btn-block">
                  Buy
                </button>
              </a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection

