@extends('admin.layouts.main')
@section('content')
<a href="{{route('admin.client.create')}}">
    create
</a>
<table class="table table-dark table-striped">

        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">date_order</th>
            <th scope="col">cost</th>
            <th scope="col">region</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
        <tr>
            <th scope="row">{{$client->id}}</th>
            <td>{{$client->title}}</td>
            <td>{{$client->date_order}}</td>
            <td>{{$client->cost}}</td>
            <td>{{$client->region}}</td>
            <td><a href="{{route('admin.client.edit',$client->id )}}">Edit</a></td>
            <td>@include('admin.client.delete.destroy')</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
