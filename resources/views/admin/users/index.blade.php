@extends('layouts.admin')

@section('content')
    @if(Session::has('user_deleted'))
        <p class="alert alert-danger">{{session('user_deleted')}}</p>
    @endif
    <h1>Users</h1>
    <div class="table__wrapper">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Is Active</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                @if($users)
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>
                                <img src="{{$user->photo ? $user->photo->image_path : 'http://placehold.it/400x400'}}" alt="" width="50">
                            </td>
                            <td><a href="{{route('users.edit', $user)}}">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role && $user->role->name ? $user->role->name : 'NO ROLE ASSIGNED'}}</td>
                            <td>{{$user->is_active ? 'yes' : 'no'}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection