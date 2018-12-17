@extends('layouts.admin')

@section('content')
    <h2>Edit Posts</h2>

    <div class="col-sm-3">
        @if ($post->photo)
            <img width="300" src="{{$post->photo->image_path}}" />
        @else
            <p>No image</p>
        @endif
    </div>
    <div class="col-sm-9">

        {!! Form::model($post,['method' => 'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category') !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('photo_id', 'Photo') !!}
            {!! Form::file('photo_id', null) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('body', 'Description') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Delete Post', ['class'=> 'btn btn-danger' ]) !!}
        </div>
        {!! Form::close() !!}
        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
        
    </div>

    @include('includes.form_error')

@endsection