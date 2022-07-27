@extends('admin.layouts.main')
@section('content')
    <div class="d-flex justify-content-between">
        <a href="{{route('admin.user.index')}}">
            on main page
        </a>
        <a href="{{route('admin.user.edit', $user->id)}}">
            edit
        </a>

        @include('admin.user.delete.destroy')

    </div>

    <table class="table table-secondary table-striped">
        <tr>
            <th scope="col">#</th>
            <th scope="row">{{$user->id}}</th>
        </tr>
        <tr>
            <th scope="col">Name</th>
            <th scope="row">{{$user->name}}</th>
        </tr>

        <tr>
            <th scope="col">Email</th>
            <th scope="row">{{$user->email}}</th>
        </tr>


        <tr>
            <th scope="col">Role</th>
            <th scope="row">{{$user->role}}</th>
        </tr>



    </table>
@endsection
