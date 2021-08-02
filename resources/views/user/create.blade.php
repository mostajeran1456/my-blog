@extends("layout.master")

@section("ex-title","user list")

@section("content")
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route("user.store")}}" method="post" class="text-success">
        @csrf
        <div class="form-group row">
            <div class="col-md">
                <label for="name">Name :</label>
                <input type="text" required name="name" id="name" class="form-control" value="{{old("name")}}">
            </div>
            <div class="col-md">
                <label for="email">Email :</label>
                <input type="text" required name="email" id="email" class="form-control" value="{{old("email")}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md">
                <label for="password">Password :</label>
                <input type="text" required name="password" id="password" class="form-control"
                       value="{{old("password")}}">
            </div>
            <div class="col-md align-self-center">
                <input type="submit" value="Save" class="btn btn-success rounded btn-block">
            </div>
        </div>
    </form>
@endsection
