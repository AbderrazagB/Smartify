@extends('layouts.app')

@section('content')
<div class="table-responsive mx-5 ">
    <a style="float: right;" class="btn b1 m-2" href="{{route('addProduct')}}">Add Product</a>
    <table class="table table-hover align-middle table-sm table-dark">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Details</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($products as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td><img src="{{ asset('/storage/images/'. $item->pic) }}" style="height: 100px"></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->category}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->qntStock}}</td>
                    <td><a class="btn btn-secondary" href="{{route('manageProduct.show',$item->id)}}">Show</a></td>
                    <td>
                        @auth

                        <form action="{{route('manageProduct.destroy',$id = $item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-1">Delete</button>
                             </form>
                             <hr>
                             <a class="btn btn-light mb-1" href="{{route('manageProduct.edit',$item->id)}} ">Edit</a>

                        @endauth
                    </td>
                </tr>
                @endforeach


            </tbody>
            <tfoot>

            </tfoot>
    </table>

    <div class="pagination justify-content-center">{!!  $products->links()   !!}</div>
</div>



@endsection
