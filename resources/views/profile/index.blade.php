@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="col-12">
                <!-- Page title -->
                <div >
                    <h3 class="tw">Welcome, <span class="ty">{{Auth::user()->name}}</span>!</h3>
                    <br>
                    <h3 class="tw">Profile Info</h3>
                    <hr class="ty">
                </div>
                <!-- Form START -->
                <form class="file-upload tw">
                    <fieldset disabled="disabled">
                    <div class="row gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Contact detail:</h4>
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">First Name:</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="First name" value="{{Auth::user()->name}}">
                                    </div>
                                    <!-- Last name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Last Name:</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Last name" value="{{Auth::user()->last_name}}">
                                    </div>
                                    <!-- Phone number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Phone number:</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Phone number" value="{{Auth::user()->phone}}">
                                    </div>
                                    <!-- Mobile number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Adress:</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Phone number" value="{{Auth::user()->adresse}}">
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email:</label>
                                        <input type="email" class="form-control" id="inputEmail4" value="{{Auth::user()->email}}">
                                    </div>
                                </div> <!-- Row END -->
                            </div>
                        </div>


                    </div> <!-- Row END -->
                    <!-- button -->
                    </fieldset>
                    <div class="gap-3 d-md-flex justify-content-md-end text-center">
                        <div class="col align-self-start" >
                            <a style="float: left;"  class="btn b1" href="{{route('home')}}" >Home</a>
                        </div>
                        <a href="{{route('changePasswordGet')}}"><button type="button" class="btn btn-light btn-sm p-1" >Change Password</button></a>
                        <a href="{{route('ProfileEdit')}}"><button type="button" class="btn btn-dark btn-sm p-1">Update profile</button></a>
                        <a href="{{route('accDestroy')}}"><button type="button" class="btn btn-danger btn-sm p-1" >Delete profile</button></a>

                    </div>

                </form> <!-- Form END -->
            </div>
        </div>
        </div>

@endsection
