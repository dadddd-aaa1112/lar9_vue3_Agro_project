@extends('admin.layouts.main')
@section('content')
    <div class="d-flex justify-content-between">
        <a href="{{route('admin.culture.index')}}">
            on main page
        </a>
        <a href="{{route('admin.culture.edit', $culture->id)}}">
            edit
        </a>

            @include('admin.culture.delete.destroy')

    </div>

    <table class="table table-secondary table-striped">
        <tr>
            <th scope="col">#</th>
            <th scope="row">{{$culture->id}}</th>
        </tr>
        <tr>
            <th scope="col">Title</th>
            <th scope="row">{{$culture->title}}</th>
        </tr>

    </table>
@endsection
