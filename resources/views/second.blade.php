@extends("layout.master")

@section("ex-title","main")

@section("content")
    <h2 class="text-danger">
        This is second page 😂

        {{$user->email}}
        <input type="text" name="{{\App\Models\Post::TITLE}}">
        <ul>
            @foreach(["reza","ali","ahan_melal"] as $item)
                <li>{{$item}}</li>
            @endforeach
        </ul>
    </h2>
@endsection
