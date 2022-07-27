@extends('admin.layouts.main')
@section('content')
    <a href="{{route('admin.user.index')}}">
        on main page
    </a>

    <form action="{{route('admin.user.update', $user->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}">
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" >
                @foreach($roles as $id => $role)
                    <option value="{{$id}}"
                        {{ $id == $user->role ? 'selected' : '' }}
                    >{{$role}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
