@extends('admin.layouts.main')
@section('content')
    <h3>Удобрения</h3>
    <div class="d-flex justify-content-between">
        <a href="{{route('admin.fertilizer.index')}}">
            На главную страницу
        </a>
        <a href="{{route('admin.fertilizer.edit', $fertilizer->id)}}">
            Редактировать
        </a>

            @include('admin.fertilizer.delete.destroy')

    </div>


    <table class="table table-dark table-striped">
        <tr>
            <th scope="col">#</th>
            <th scope="row">{{$fertilizer->id}}</th>
        </tr>
        <tr>
            <th scope="col">Title</th>
            <td>{{$fertilizer->title}}</td>
        </tr>
        <tr>
            <th scope="col">date_order</th>
            <td>{{$fertilizer->date_order}}</td>

        <tr>
            <th scope="col">cost</th>
            <td>{{$fertilizer->cost}}</td>
        </tr>
        <tr>
            <th scope="col">region</th>
            <td>{{$fertilizer->region}}</td>
        </tr>

        <tr>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </table>
@endsection
