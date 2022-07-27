@extends('admin.layouts.main')
@section('content')
    <a href="{{route('admin.fertilizer.create')}}">
        create
    </a>
    <table class="table table-dark table-striped">

        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>

            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fertilizers as $fertilizer)
            <tr>
                <th scope="row">{{$fertilizer->id}}</th>
                <td>{{$fertilizer->title}}</td>

                <td><a href="{{route('admin.fertilizer.edit',$fertilizer->id )}}">Edit</a></td>
                <td>@include('admin.fertilizer.delete.destroy')</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
