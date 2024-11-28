@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
            <div class="col-12">
                <!-- Page title -->
                <div >
                    <h3 class="tw">Billing Info</h3>
                    <hr class="ty">
                </div>
                <!-- Form START -->
                <form class="file-upload tw" action="{{route('billingInfo', ['ord_id'=>$order->id])}}" method="post">
                    @csrf
                     @method('PUT')
                    <div class="row gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Name:</label>
                                        <input type="text" name="name" class="form-control" placeholder="" aria-label="First name" value="{{Auth::user()->name}}">
                                    </div>
                                    <!-- Phone number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Phone number:</label>
                                        <input type="text" name="number" class="form-control" placeholder="" aria-label="Phone number" value="{{Auth::user()->phone}}">
                                    </div>
                                    <!-- Mobile number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Adress:</label>
                                        <input type="text" name="address" class="form-control" placeholder="" aria-label="Phone number" value="{{Auth::user()->adresse}}">
                                    </div>
                                </div> <!-- Row END -->
                            </div>
                        </div>

                    </div>
                    <!-- button -->
                    <div class="gap-3 d-md-flex justify-content-md-end text-center">
                        {{-- <div class="col align-self-start" >
                            <a style="float: left;"  class="btn btn-danger btn-l" href="{{ route('Cart')}}" >Cancel</a>
                        </div> --}}
                        <button type="submit" class="btn b1 btn-l" >Confirm</button>

                    </div>

                </form> <!-- Form END -->
            </div>
        </div>
        </div>

@endsection
