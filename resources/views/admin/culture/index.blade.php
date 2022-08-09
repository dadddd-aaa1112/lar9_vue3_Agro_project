@extends('admin.layouts.main')
@section('content')
    <h3>Культуры</h3>

        @if(request()->has('view_deleted'))
            <a href="{{route('admin.culture.index')}}">Посмотреть все</a>
            <a href="{{route('admin.culture.restore_all')}}">Восстановить все</a>
        @else
            <div class="d-flex flex-row justify-content-between mb-3">
                <div class="d-flex flex-column">
                    <a href="{{route('admin.culture.create')}}">Создать</a>
                    <a href="{{route('admin.culture.index', ['view_deleted' => 'DeletedRecords'])}}">Посмотреть
                        удаленные</a>

                    <form action="{{route('admin.culture.export')}}" method="get">
                        <button type="submit" class="btn btn-outline-success">
                            Сохранить данные в Excel
                        </button>
                    </form>

                </div>
                <div class="d-flex flex-column">


                    @if(session('status'))
                        <div class="alert alert-info">
                            {{session('status')}}
                        </div>
                    @endif

                    <form action="{{route('admin.culture.excel')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputFile">Загрузить Excel файл</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="excel_culture">
                                    <label class="custom-file-label "></label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Выбрать файл</span>
                                </div>
                            </div>
                        </div>
                        <button type="submit">Загрузка</button>

                    </form>
                </div>

            </div>
        @endif

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
@if(request()->has('view_deleted'))
@else
{{$cultures->links()}}
@endif
@endsection
