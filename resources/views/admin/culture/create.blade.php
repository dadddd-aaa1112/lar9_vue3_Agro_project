@extends('admin.layouts.main')
@section('content')
    <h3>Культуры</h3>
    <form action="{{route('admin.culture.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

   @endsection
