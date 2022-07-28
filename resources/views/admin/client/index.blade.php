@extends('admin.layouts.main')
@section('content')

    <div class="mb-3 w-50 d-flex justify-content-between">
        @if(request()->has('view_deleted'))
            <a href="{{route('admin.client.index')}}">На главную </a>
            <a href="{{route('admin.client.restore_all')}}">Восстановить все</a>
        @else

            <a href="{{route('admin.client.create')}}">
                Создать
            </a>
            <a href="{{route('admin.client.index', ['view_deleted' => 'DeletedRecords'])}}">Посмотреть удаленные </a>
        @endif
    </div>
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование</th>
            <th scope="col">Действия</th>

        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <th scope="row">{{$client->id}}</th>
                <td>{{$client->title}}</td>
                @if(request()->has('view_deleted'))
                    <td><a href="{{route('admin.client.restore',$client->id )}}">Восстановить</a></td>
                    <td><a href="{{route('admin.client.force_delete',$client->id )}}">Удалить навсегда</a></td>
                @else
                    <td><a href="{{route('admin.client.edit',$client->id )}}">Edit</a></td>
                    <td>@include('admin.client.delete.destroy')</td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
