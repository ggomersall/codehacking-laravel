@extends('layouts.admin')

@section('content')
    @include('includes.back_button')
    <h2>Create User</h2>
    <div class="col-sm-12">
        @include('includes.form_error')
    </div>
    <div class="col-sm-2">
        @if($user->photo) 
            <img src="{{$user->photo->image_path}}" alt="" class="img-responsive img-rounded" width="100">
        @else 
            <p>No photo</p>
        @endif
        
    </div>
    <div class="col-sm-10">
        {!! Form::model($user,  ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'password') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('is_active', 'Status') !!}
                {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), $user->is_active, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('profile_image', 'Profile Picture') !!}
                {!! Form::file('profile_image', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User', ['class'=> 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete User', ['class'=> 'btn btn-danger' ]) !!}
            </div>
        {!! Form::close() !!}
    </div>

@endsection