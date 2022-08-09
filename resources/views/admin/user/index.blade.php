@extends('admin.layouts.main')
@section('content')
    <h3>Пользователи</h3>
    <div class="mb-3 d-flex justify-content-between w-50">
        @if(request()->has('view_deleted'))
            <a href="{{route('admin.user.index')}}">Посмотреть все</a>
            <a href="{{route('admin.user.restore_all')}}">Восстановить все</a>
        @else
            <a href="{{route('admin.user.create')}}">Создать</a>
            <a href="{{route('admin.user.index', ['view_deleted' => 'DeletedRecords'])}}">Посмотреть удаленные</a>

        <form action="{{route('admin.user.export')}}" method="get">
            <button type="submit" class="btn btn-outline-success">Сохранить данные в Excel</button>
        </form>
        @endif




            <form action="{{route('admin.user.excel')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputFile">Загрузить Excel файл</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="user_excel">
                            <label class="custom-file-label"></label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Выбрать файл</span>
                        </div>
                    </div>
                </div>
                <button type="submit">Загрузка</button>

            </form>


    </div>
    <table class="table table-secondary table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Наименования</th>
            <th scope="col">Действия</th>

        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td><a href="{{route('admin.user.show', $user->id)}}">{{$user->name}}</a></td>
                @if(request()->has('view_deleted'))
                    <td><a href="{{route('admin.user.restore',$user->id )}}">Восстановить</a></td>
                    <td><a href="{{route('admin.user.force_delete',$user->id )}}">Удалить навсегда</a></td>
                @else
                    <td><a href="{{route('admin.user.edit',$user->id )}}">Редактировать</a></td>
                    <td>@include('admin.user.delete.destroy')</td>
                @endif
            </tr>
        @endforeach
    </table>
    @if(request()->has('view_deleted'))
    @else
        {{$users->links()}}
    @endif
@endsection
