@extends('admin.layouts.main')
@section('content')
    <a href="{{route('admin.culture.create')}}">
        create
    </a>
    <table class="table table-secondary table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cultures as $culture)
            <tr>
                <th scope="row">{{$culture->id}}</th>
                <td><a href="{{route('admin.culture.show', $culture->id)}}">{{$culture->title}}</a></td>
                <td><a href="{{route('admin.culture.edit',$culture->id )}}">Edit</a></td>
                <td>@include('admin.culture.delete.destroy')</td>
            </tr>
        @endforeach
    </table>
@endsection
