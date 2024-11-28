@extends('layouts.app')

@section('content')
<div class="table-responsive mx-5 ">
    <table class="table table-hover align-middle table-sm table-dark">
        <a style="float: right;" class="btn b1 m-2" href="{{route('home')}}">Home</a>
        <thead class="thead-dark">
            <tr>
                <th>Reference</th>
                <th>Name</th>
                <th>Number</th>
                <th>Address</th>
                <th>Ordered at:</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($purchases as $order)
                <tr>
                    <td>{{$order->ref_ord}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->number}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->total_price}} DT</td>
                    <td>
                        @auth
                        @if (Auth::user()->isAdmin)
                        @if ($order->state == 1)
                        <h5 class="text-success mt-1">Confirmed</h5>
                        @else
                            @if ($order->state == 2)
                            <h5 class="text-danger mt-1">Rejected</h5>
                            @else
                                <form action="{{route('ConfirmPurchase',$order->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" name="action" value="1" class="btn btn-success mt-1">Confirm</button>
                                <hr>
                                <button type="submit" name="action" value="2" class="btn btn-danger mt-1">Reject</button>
                                </form>
                            @endif

                            @endif
                        @else
                                  @if ($order->state == 1)
                                    <h5 class="text-success mt-1">Confirmed</h5>
                                @else
                                    @if ($order->state == 0)
                                    <h5 class="text-secondary mt-1">Pending...</h5>
                                    <hr>
                                    <form action="{{route('cancelPurchase',$order->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mt-1">Cancel</button>
                                        </form>
                                    @else
                                    <h5 class="text-danger mt-1">Rejected</h5>
                                    @endif

                                @endif
                        @endauth
                        @endif
                        <hr>
                        <a class="btn btn-light mb-1" href="{{route('PurchaseDetails',['ord_id'=>$order->id])}} ">Details</a>

                    </td>
                </tr>
                @endforeach


            </tbody>
            <tfoot>

            </tfoot>
    </table>
    <p><span class="totalPurchase"></span> </p>
    {{-- <div class="pagination justify-content-center">{!!  $purchases->links()   !!}</div> --}}
</div>



@endsection
