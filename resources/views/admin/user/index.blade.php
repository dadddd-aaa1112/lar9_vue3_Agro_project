@extends('admin.layouts.main')
@section('content')
    <a href="{{route('admin.user.create')}}">
        create
    </a>
    <table class="table table-secondary table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td><a href="{{route('admin.user.show', $user->id)}}">{{$user->name}}</a></td>
                <th scope="row">{{$user->email}}</th>
                <td><a href="{{route('admin.user.edit',$user->id )}}">Edit</a></td>
                <td>@include('admin.user.delete.destroy')</td>
            </tr>
        @endforeach
    </table>
@endsection
