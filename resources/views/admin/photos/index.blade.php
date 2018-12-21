@extends('layouts.admin')

@section('content')
  <h1>All Photos</h1>
  <div class="table__wrapper">
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>Id</th>
                  <th>Image</th>
                  <th>Image Path</th>
                  <th>Created</th>
                  <th>Updated</th>
              </tr>
          </thead>
          <tbody>
          @if($photos)
              @foreach ($photos as $photo)
              <tr>
                  <td>{{$photo->id}}</td>
                  <td><img height="50" src="{{$photo->image_path ? $photo->image_path : 'http://placehold.it/400x400'}}" alt=""/></td>
                  <td>{{$photo->image_path}}</td>
                  <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                  <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                  <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPhotosController@destroy', $photo->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=> 'btn btn-danger' ]) !!}
                        </div>
                    {!! Form::close() !!}
                  </td>
              </tr>
              @endforeach
          @endif
          </tbody>
      </table>
  </div>
@endsection