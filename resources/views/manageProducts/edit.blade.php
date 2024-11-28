@extends('layouts.app')
@section('content')

  @if ($errors->any())
  <div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $item)
        <li>{{$item}}</li>
        @endforeach

    </ul>
  </div>

  @endif



<div class="card text-white bg-dark bg-gradient bg-opacity-10 border-0 mx-5">
    <h2 class="tw justify-content-center text-center mt-2">Edit Product</h2>
    <div class="card-body">
<form action="{{route('manageProduct.update', $product->id)}}" method="post"  enctype="multipart/form-data">
     @csrf
     @method('PUT')

    <div class="mb-3">
      <label for="name" class="form-label" >Name</label>
      <input type="text" class="form-control" name="name" name="name" value="{{$product->name}}" required autocomplete="name" autofocus >
     </div>
     <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" value="{{$product->price}}" required autocomplete="price" autofocus >
       </div>
       <div class="mb-3">
        <label for="qntStock" class="form-label" >Quantity</label>
        <input type="text" class="form-control" name="qntStock" value="{{$product->qntStock}}" required autocomplete="qntStock" autofocus >
       </div>
       <div class="mb3">
        <label for="category">Category</label>
        <select class="form-control cat" name="category" value="{{$product->category}}" required autocomplete="category" autofocus >
          <option disabled selected></option>
          <option>Phones</option>
          <option>Tvs</option>
          <option>Headphones</option>
          <option>Pcs</option>
        </select>
    </div>

     <div class="mb-3">
       <label for="details" class="form-label">Details</label>
       <textarea class="form-control cat" name="details" id="" rows="2" required autocomplete="details" autofocus> {{$product->name}}</textarea>
     </div>
     <div class="mb-3">
        <div class="mb-3">
            <img src="{{ asset('/storage/images/'. $product->pic) }}" width="300px">

            <input type="file" class="form-control cat" name="pic" >
           </div>
       </div>
       <div style="float: right" class="row">
        <div class="col align-self-start">
         <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>

      </div>
      <a   class="btn btn-danger" href="{{route('manageProducts')}}" >Cancel</a>




    </form>


</div>
</div>


@endsection
