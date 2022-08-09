@extends('admin.layouts.main')
@section('content')
    @if(session('status'))
        @if(session('status') == 'finished')
            <div class="alert alert-default-success">
                Данные загружены успешно
            </div>
        @else
            <div class="alert alert-default-danger">
                Ошибка при загрузке
            </div>
        @endif
    @endif

    @if($errors->any())
        <div class="alert alert-default-danger">
            <h5 class="text-danger"> Ошибки при загрузке: </h5>
            <ol>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ol>
        </div>
    @endif

    <h3>Клиенты</h3>
    <div class="d-flex ">
        @if(request()->has('view_deleted'))
            <div class="w-100">
                @else
                    <div class="w-75 mr-3">
                        @endif
                        <div class="mb-3 w-50 d-flex justify-content-between">
                            @if(request()->has('view_deleted'))
                                <a href="{{route('admin.client.index')}}">На главную </a>
                                <a href="{{route('admin.client.restore_all')}}">Восстановить все</a>
                            @else

                                <a href="{{route('admin.client.create')}}">
                                    Создать
                                </a>
                                <a href="{{route('admin.client.index', ['view_deleted' => 'DeletedRecords'])}}">Посмотреть
                                    удаленные </a>

                                <form action="{{route('admin.client.export')}}" method="get">
                                    <button class="btn btn-outline-success" type="submit">Сохранить данные в Excel
                                    </button>
                                </form>
                            @endif
                        </div>
                        <table class="table table-dark table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@sortablelink('title','Наименование')</th>
                                <th scope="col">Дата заказа</th>
                                <th scope="col">@sortablelink('cost', 'Цена')</th>
                                <th scope="col">Регион</th>
                                <th scope="col">Действия</th>

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
                                    @if(request()->has('view_deleted'))
                                        <td><a href="{{route('admin.client.restore',$client->id )}}">Восстановить</a>
                                        </td>
                                        <td><a href="{{route('admin.client.force_delete',$client->id )}}">Удалить
                                                навсегда</a></td>
                                    @else
                                        <td><a href="{{route('admin.client.edit',$client->id )}}">Редактировать</a></td>
                                        <td>@include('admin.client.delete.destroy')</td>
                                        <td><a class="btn btn-outline-primary" href="{{route('admin.client.dogovor', $client->id)}}">Сформировать договор</a></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if(request()->has('view_deleted'))
                    @else
                        <div class="w-25 mt-4">
                            <div class="d-flex flex-column">


                                <form class="mb-3" action="{{route('admin.client.excel')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputFile">Загрузить Excel файл</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="excel_client">
                                                <label class="custom-file-label"></label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Выбрать файл</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit">Загрузка</button>
                                </form>

                                <form action="{{route('admin.client.index')}}" method="get">
                                    <label class="mb-n1">Поиск по наименованию</label>
                                    <input
                                        class="mb-3 form-control"
                                        name="search_title"
                                        @if(isset($_GET['search_title']))
                                            value="{{$_GET['search_title']}}"
                                        @endif
                                        placeholder="Введите наименование">

                                    <label class="mb-n1">Даты договора</label>
                                    <div class="mb-3 d-flex flex-row">

                                        <input
                                            class="form-control mr-3"
                                            name="dateMin"
                                            @if(isset($_GET['dateMin']))
                                                value="{{$_GET['dateMin']}}"
                                            @else
                                                value="{{$dateMin}}"
                                            @endif
                                            type="date"
                                            placeholder="Введите min дату"
                                        >
                                        <input
                                            class="form-control ml-3"
                                            name="dateMax"
                                            @if(isset($_GET['dateMax']))
                                                value="{{$_GET['dateMax']}}"
                                            @else
                                                value="{{$dateMax}}"
                                            @endif
                                            type="date"
                                            placeholder="Введите max дату"
                                        >
                                    </div>

                                    <label class="mb-n1">Стоимость поставки</label>
                                    <div class="d-flex flex-row mb-3">
                                        <input
                                            class="form-control mr-3"
                                            name="costMin"
                                            placeholder="введите min дату"
                                            @if(isset($_GET['costMin']))
                                                value="{{$_GET['costMin']}}"
                                            @else
                                                value="{{$costMin}}"
                                            @endif
                                            type="number"
                                        >
                                        <input
                                            class="form-control ml-3"
                                            type="number"
                                            name="costMax"
                                            @if(isset($_GET['costMax']))
                                                value="{{$_GET['costMax']}}"
                                            @else
                                                value="{{$costMax}}"
                                            @endif
                                            placeholder="Введите max стоимость"

                                        >
                                    </div>


                                    <label class="mb-n1">Регион</label>
                                    <div class="mb-3">
                                        <select multiple class="form-select" name="region_filter[]">
                                            @foreach($regions as $region)
                                                <option
                                                    value="{{$region->id}}"
                                                @if(isset($_GET['region_filter']))
                                                    {{  is_array($_GET['region_filter']) &&
                                                    in_array($region->id, $_GET['region_filter']) ?
                                                    'selected' : ''
                                                    }}
                                                    @endif
                                                >
                                                    {{$region -> region}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button class="btn btn-info w-50 mb-3" type="submit">Установить фильтр</button>
                                </form>
                                <form action="{{route('admin.client.index')}}" method="get">
                                    <button class="btn btn-info w-50 mb-3" type="submit">Сбросить все фильтры</button>
                                </form>
                            </div>
                        </div>
                    @endif

            </div>

    @if(request()->has('view_deleted'))
    @else
        {{$clients->withQueryString()->links()}}
    @endif
@endsection
