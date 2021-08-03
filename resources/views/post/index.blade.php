@extends("layout.master")

@section("ex-title","Posts")

@section("content")
    @if(Session()->has("msg"))
        <div class="alert alert-success" xmlns="">
            <p>{{Session()->get("msg")}}</p>
        </div>
    @endif
    <div class="row mx-auto">
        <a href="{{route("post.create")}}" class="btn btn-success rounded">Create new Post</a>
    </div>
    <table class="table table-border table-hover table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Author</th>
            <th>title</th>
            <th>manage</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->title}}</td>
                <td>
                    <form action="{{route("user.destroy",$post->id)}}" method="post">
                        <a href="{{route("user.edit",$post->id)}}" class="btn btn-warning rounded">edit</a>
                        @method("delete")
                        @csrf
                        <input type="submit" value="Delete" class="btn btn-danger rounded">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        console.log({!! json_encode(\Illuminate\Support\Facades\DB::getQueryLog()) !!})
    </script>
@endsection
