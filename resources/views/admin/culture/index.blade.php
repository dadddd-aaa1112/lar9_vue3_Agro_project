@extends('admin.layouts.main')
@section('content')
    <h3>Культуры</h3>
    <div class="mb-3 w-50 d-flex justify-content-between">
        @if(request()->has('view_deleted'))
            <a href="{{route('admin.culture.index')}}">Посмотреть все</a>
            <a href="{{route('admin.culture.restore_all')}}">Восстановить все</a>
        @else
            <a href="{{route('admin.culture.create')}}">Создать</a>
            <a href="{{route('admin.culture.index', ['view_deleted' => 'DeletedRecords'])}}">Посмотреть удаленные</a>
        @endif
    </div>
    <table class="table table-secondary table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
        @foreach($cultures as $culture)
            <tr>
                <th scope="row">{{$culture->id}}</th>
                <td><a href="{{route('admin.culture.show', $culture->id)}}">{{$culture->title}}</a></td>
                @if(request()->has('view_deleted'))
                    <td><a href="{{route('admin.culture.restore',$culture->id )}}">Восстановить</a></td>
                    <td><a href="{{route('admin.culture.force_delete',$culture->id )}}">Удалить навсегда</a></td>
                @else
                    <td><a href="{{route('admin.culture.edit',$culture->id )}}">Редактировать</a></td>
                    <td>@include('admin.culture.delete.destroy')</td>
                @endif
            </tr>
        @endforeach
    </table>
@endsection
