@extends("layout.master")

@section("ex-title","user list")

@section("content")
    @if(Session()->has("msg"))
        <div class="alert alert-success">
            <p>{{Session()->get("msg")}}</p>
        </div>
    @endif
    <div class="row mx-auto">
        <a href="{{route("user.create")}}" class="btn btn-success rounded">Create new user</a>
    </div>
    <table class="table table-border table-hover table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
