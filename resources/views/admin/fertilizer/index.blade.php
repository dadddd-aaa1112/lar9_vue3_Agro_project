@extends('admin.layouts.main')
@section('content')
    <div class="w-50 mb-3 d-flex justify-content-between">
        @if(request()->has('view_deleted'))
            <a href="{{route('admin.fertilizer.index')}}">Посмотреть все</a>
            <a href="{{route('admin.fertilizer.restore_all')}}">Восстановить все</a>
        @else
            <a href="{{route('admin.fertilizer.create')}}">Создать</a>
            <a href="{{route('admin.fertilizer.index', ['view_deleted' => 'DeletedRecords'])}}">Посмотреть удаленные</a>
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
        @foreach($fertilizers as $fertilizer)
            <tr>
                <th scope="row">{{$fertilizer->id}}</th>
                <td>{{$fertilizer->title}}</td>
                @if(request()->has('view_deleted'))
                    <td><a href="{{route('admin.fertilizer.restore',$fertilizer->id )}}">Восстановить</a></td>
                    <td><a href="{{route('admin.fertilizer.force_delete',$fertilizer->id )}}">Удалить навсегда</a></td>
                @else
                    <td><a href="{{route('admin.fertilizer.edit',$fertilizer->id )}}">Edit</a></td>
                    <td>@include('admin.fertilizer.delete.destroy')</td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
