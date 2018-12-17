@extends('layouts.admin')

@section('content')
    <h2>Posts</h2>
    <div class="table__wrapper">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Photo Id</th>
                    <th>User</th>
                    <th>Category Id</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
            @if($posts)
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="50" src="{{$post->photo ? $post->photo->image_path : 'http://placehold.it/400x400'}}" alt=""/></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorised'}}</td>
                    <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{str_limit($post->body, 30)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@endsection