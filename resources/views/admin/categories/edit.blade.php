@extends('layouts.admin')

@section('content')
@include('includes.back_button')
  <h2>Edit Posts</h2>

<div class="col-sm-6">
  {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
    <div class="form-group">
      {!! Form::label('name', 'Name:') !!}
      {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
  {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
  <div class="form-group">
      {!! Form::submit('Delete Post', ['class'=> 'btn btn-danger' ]) !!}
  </div>
  {!! Form::close() !!}
</div>


   @include('includes.form_error')

@endsection