@extends('layouts.app')

@section('content')
<div class="table-responsive mx-5 ">
    <table class="table table-hover align-middle table-sm table-dark">
        <a style="float: right;" class="btn b1 m-2" href="{{route('home')}}">Home</a>
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Number</th>
                <th>Address</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->adresse}}</td>
                    <td>{{$user->email}}</td>

                    <td>
                        @auth
                                <form action="{{route('DeleteUser',$user->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="action" class="btn btn-danger mt-1">DELETE</button>
                                </form>
                        @endauth
                    </td>
                </tr>
                @endforeach


            </tbody>
            <tfoot>

            </tfoot>
    </table>
    <div class="pagination justify-content-center "> {!!  $users->appends($_GET)->links()   !!}</div>
</div>



@endsection
