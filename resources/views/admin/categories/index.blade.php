@extends('layouts.admin')

@section('content')
  <h1>Categories</h1>
  <div class="col-sm-6">
    {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
      <div class="form-group">
        {!! Form::label('name', 'Title:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::submit('Create Category', null, ['class'=>'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}

  </div>
  <div class="col-sm-6">

    <div class="table__wrapper">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Category name</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
          @if($categories)
          @foreach ($categories as $category)
          <tr>
            <td>{{$category->id}}</td>
            <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
            <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
            <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : 'no date'}}</td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
    
@endsection