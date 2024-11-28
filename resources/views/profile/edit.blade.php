@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
            <div class="col-12">
                <!-- Page title -->
                <div >
                    <h3 class="tw">Update Profile</h3>
                    <hr class="ty">
                </div>
                <!-- Form START -->
                <form class="file-upload tw" action="{{route('Profiles.update', Auth::user()->id)}}" method="post">
                    @csrf
                     @method('PUT')
                    <div class="row gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Contact detail</h4>
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">First Name:</label>
                                        <input type="text" name="name" class="form-control" placeholder="" aria-label="First name" value="{{Auth::user()->name}}">
                                    </div>
                                    <!-- Last name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Last Name:</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="" aria-label="Last name" value="{{Auth::user()->last_name}}">
                                    </div>
                                    <!-- Phone number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Phone number:</label>
                                        <input type="text" name="phone" class="form-control" placeholder="" aria-label="Phone number" value="{{Auth::user()->phone}}">
                                    </div>
                                    <!-- Mobile number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Adress:</label>
                                        <input type="text" name="adresse" class="form-control" placeholder="" aria-label="Phone number" value="{{Auth::user()->adresse}}">
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email:</label>
                                        <input type="email" name="email" class="form-control" id="inputEmail4" value="{{Auth::user()->email}}">
                                    </div>
                                </div> <!-- Row END -->
                            </div>
                        </div>

                    </div>
                    <!-- button -->
                    <div class="gap-3 d-md-flex justify-content-md-end text-center">
                        <div class="col align-self-start" >
                            <a style="float: left;"  class="btn btn-danger btn-l" href="{{ route('Profile')}}" >Cancel</a>
                        </div>
                        <button type="submit" class="btn b1 btn-l" >Confirm</button>

                    </div>

                </form> <!-- Form END -->
            </div>
        </div>
        </div>

@endsection
