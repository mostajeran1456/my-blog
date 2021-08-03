@extends("layout.master")

@section("ex-title","Create Post")

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

    <form action="{{route("post.store")}}" method="post" class="text-success">
        @csrf
        <div class="form-group row">
            <div class="col-md">
                <label for="{{\App\Models\Post::TITLE}}">Title :</label>
                <input type="text" required name="{{\App\Models\Post::TITLE}}" id="{{\App\Models\Post::TITLE}}" class="form-control" value="{{old(\App\Models\Post::TITLE)}}">
            </div>
            <div class="col-md">
            </div>
        </div>
        <div class="form-group row">
            <textarea name="{{\App\Models\Post::CONTENT}}" id="{{\App\Models\Post::CONTENT}}" class="form-control">{{old(\App\Models\Post::CONTENT)}}</textarea>
        </div>
        <input type="submit" value="Save" class="btn btn-success rounded btn-block">
    </form>
@endsection
