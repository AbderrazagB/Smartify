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
    <h2 class="tw justify-content-center text-center mt-2">Add Product</h2>
    <div class="card-body">

<form action="{{route('manageProduct.store')}}" method="post"  enctype="multipart/form-data">
@csrf

<div class="mb-3">
  <label for="name" class="form-label" >Name</label>
  <input type="text" class="form-control" name="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >
 </div>
 <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="text" class="form-control" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus >
   </div>
   <div class="mb-3">
    <label for="qntStock" class="form-label" >Quantity</label>
    <input type="text" class="form-control" name="qntStock" value="{{ old('qntStock') }}" required autocomplete="qntStock" autofocus >
   </div>
   <div class="mb3">
    <label for="category">Category</label>
    <select class="form-control" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus >
      <option disabled selected></option>
      <option>Phones</option>
      <option>Tvs</option>
      <option>Headphones</option>
      <option>Pcs</option>
    </select>
</div>


 <div class="mb-3">
   <label for="details" class="form-label">Details</label>
   <textarea class="form-control cat" name="details" id="" rows="2" value="{{ old('details') }}" required autocomplete="details" autofocus></textarea>
 </div>
 <div class="mb-3">
    <label for="pic" class="form-label">Image</label>
    <input type="file" class="form-control cat" name="pic" >
   </div>


   <div style="float: right" class="row">
    <div class="col align-self-start">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

  </div>
  <a   class="btn btn-danger" href="{{route('manageProducts')}}" >Cancel</a>

</form>


</div>
</div>

@endsection
