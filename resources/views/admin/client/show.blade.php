@extends('admin.layouts.main')
@section('content')
    <h3>Клиенты</h3>
    <div class="d-flex justify-content-between">
        <a href="{{route('admin.client.index')}}">
            На главную страницу
        </a>
        <a href="{{route('admin.client.edit', $client->id)}}">
            Редактировать
        </a>

            @include('admin.client.delete.destroy')

    </div>

    <table class="table table-dark table-striped">
        <tr>
            <th scope="col">#</th>
            <th scope="row">{{$client->id}}</th>
        </tr>
        <tr>
            <th scope="col">Title</th>
            <td>{{$client->title}}</td>
        </tr>
        <tr>
            <th scope="col">date_order</th>
            <td>{{$client->date_order}}</td>

        <tr>
            <th scope="col">cost</th>
            <td>{{$client->cost}}</td>
        </tr>
        <tr>
            <th scope="col">region</th>
            <td>{{$client->region}}</td>
        </tr>


    </table>
@endsection
