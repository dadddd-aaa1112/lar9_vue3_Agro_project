@extends('admin.layouts.main')
@section('content')
    <h3>Культуры</h3>
    <a href="{{route('admin.culture.index')}}">
        На главную страницу
    </a>

<form action="{{route('admin.culture.update', $culture->id)}}" method="post">
    @csrf
    @method('patch')
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value="{{$culture->title}}">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
