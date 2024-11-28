@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-dark bg-gradient bg-opacity-10 border-0">

                    <h2 class="tw justify-content-center text-center mt-2">Change password &nbsp; <i class="fa-solid fa-lock"></i></h2>


                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('changePasswordPost') }}">
                        {{ csrf_field() }}

                        <div class="mb-3{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="current-password" class="form-label">Current Password</label>
                            <input id="current-password" type="password" class="form-control" name="current-password" required>
                            @if ($errors->has('current-password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('current-password') }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-3{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="form-label">New Password</label>
                            <input id="new-password" type="password" class="form-control" name="new-password" required>
                            @if ($errors->has('new-password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('new-password') }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="new-password-confirm" class="form-label">Confirm New Password</label>
                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
