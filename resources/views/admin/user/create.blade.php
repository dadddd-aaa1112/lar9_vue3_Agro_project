@extends('admin.layouts.main')
@section('content')

    <form action="{{route('admin.user.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{old('email')}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input class="form-control" type="password" name="password" value="{{old('password')}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Password confirmation</label>
            <input  class="form-control" type="password" name="password_confirmation" value="{{old('password_confirmation')}}">
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" >
                @foreach($roles as $id => $role)
                <option value="{{$id}}"
                {{ $id == old('role') ? 'selected' : '' }}
                >{{$role}}</option>
              @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection
