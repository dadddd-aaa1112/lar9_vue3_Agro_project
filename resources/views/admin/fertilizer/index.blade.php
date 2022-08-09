@extends('admin.layouts.main')
@section('content')
    <h3>Удобрения</h3>

    <div class="d-flex">
        @if(request()->has('view_deleted'))
            <div class="w-100">
                @else
                    <div class="w-75 mr-3">
                        @endif
                        <div class="w-50 mb-3 d-flex justify-content-between">
                            @if(request()->has('view_deleted'))
                                <a href="{{route('admin.fertilizer.index')}}">Посмотреть все</a>
                                <a href="{{route('admin.fertilizer.restore_all')}}">Восстановить все</a>
                            @else
                                <a href="{{route('admin.fertilizer.create')}}">Создать</a>
                                <a href="{{route('admin.fertilizer.index', ['view_deleted' => 'DeletedRecords'])}}">Посмотреть
                                    удаленные</a>

                                <form action="{{ route('admin.fertilizer.export')}}" method="get">
                                    <button type="submit" class="btn btn-outline-success">Сохранить Excel файл</button>
                                </form>
                            @endif
                        </div>
                        <table class="table table-dark table-striped">

                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@sortablelink('title', 'Наименование')</th>
                                <th scope="col">Нормы азота</th>
                                <th scope="col">Нормы фосфора</th>
                                <th scope="col">Нормы калия</th>
                                <th scope="col">culture_id</th>
                                <th scope="col">Культуры</th>
                                <th scope="col">Район</th>
                                <th scope="col">@sortablelink('cost','Цена')</th>
                                <th scope="col">Описание</th>
                                <th scope="col">Назначение</th>
                                <th scope="col">Действия</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fertilizers as $fertilizer)
                                <tr>
                                    <th scope="row">{{$fertilizer->id}}</th>
                                    <td>{{$fertilizer->title}}</td>
                                    <td>{{$fertilizer->norm_azot}}</td>
                                    <td>{{$fertilizer->norm_fosfor}}</td>
                                    <td>{{$fertilizer->norm_kalii}}</td>
                                    <td>{{$fertilizer->culture_id}}</td>
                                    <td>{{$fertilizer->cultures->title}}</td>
                                    <td>{{$fertilizer->raion}}</td>
                                    <td>{{$fertilizer->cost}}</td>
                                    <td>{{$fertilizer->description}}</td>
                                    <td>{{$fertilizer->target}}</td>
                                    @if(request()->has('view_deleted'))
                                        <td><a href="{{route('admin.fertilizer.restore',$fertilizer->id )}}">Восстановить</a>
                                        </td>
                                        <td><a href="{{route('admin.fertilizer.force_delete',$fertilizer->id )}}">Удалить
                                                навсегда</a></td>
                                    @else
                                        <td>
                                            <a href="{{route('admin.fertilizer.edit',$fertilizer->id )}}">Редактировать</a>
                                        </td>
                                        <td>@include('admin.fertilizer.delete.destroy')</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if(request()->has('view_deleted'))

                        @else
                        {{$fertilizers->withQueryString()->links()}}
                        @endif
                    </div>
                    @if(request()->has('view_deleted'))

                    @else

                        <div class="w-25">
                            <div class="d-flex flex-column">

                                @if (session('status'))
                                    <div class="alert alert-info">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form class="mb-3 mt-4" action="{{route('admin.fertilizer.excel')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputFile">Загрузить Excel файл</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="excel_fertilizer">
                                                <label class="custom-file-label "></label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Выбрать файл</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit">Загрузка</button>
                                </form>

                                <form action="{{route('admin.fertilizer.index')}}" method="get">


                                    <label class="mb-n1">Поиск по наименованию,<br>
                                        описанию,<br>
                                        назначению
                                    </label>
                                    <input
                                        name="search_field"
                                        class="form-control mb-3"
                                        @if(isset($_GET['search_field']))
                                            value="{{$_GET['search_field']}}"
                                        @endif
                                        placeholder="Введите наименование"
                                    >


                                    <label class="mb-n1">Районы
                                        <select class="form-select mb-3 w-100" multiple name="raionsFilter[]">
                                            @foreach($raions as $raion)
                                                <option
                                                    value="{{$raion->id}}"
                                                @if(isset($_GET['raionsFilter']))
                                                    {{is_array($_GET['raionsFilter']) &&
                                                     in_array($raion->id, $_GET['raionsFilter']) ?
                                                     'selected' : '' }}
                                                    @endif
                                                >
                                                    {{$raion->raion}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </label>


                                    <div class="d-flex flex-col">
                                        <label class="mb-n1">Культуры
                                            <select class="form-select mb-3 w-100" multiple name="culturesFilter[]">
                                                @foreach($cultures as $culture)
                                                    <option
                                                        class="form-select"
                                                        value="{{$culture->id}}"
                                                    @if(isset($_GET['culturesFilter']))
                                                        {{ is_array($_GET['culturesFilter']) &&
                                                        in_array($culture->id, $_GET['culturesFilter'])
                                                        ? 'selected' : ''}}
                                                        @endif

                                                    >
                                                        {{$culture->title}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>

                                    <label class="mb-n1 ">Стоимость</label>
                                    <div class="d-flex flex-row mb-3">
                                        <input
                                            class="form-control mr-3"
                                            name="costMin"
                                            type="number"
                                            step="any"
                                            placeholder="Введите min стоимость"
                                            @if(isset($_GET['costMin']))
                                                value="{{$_GET['costMin']}}"
                                            @else
                                                value="{{$costMin}}"
                                            @endif
                                        >
                                        <input
                                            class="form-control ml-3"
                                            name="costMax"
                                            step="any"
                                            type="number"
                                            placeholder="Введите max стоимость"
                                            @if(isset($_GET['costMax']))
                                                value="{{$_GET['costMax']}}"
                                            @else
                                                value="{{$costMax}}"
                                            @endif
                                        >

                                    </div>

                                    <label class="mb-n1 ">Нормы азота</label>
                                    <div class="d-flex flex-row mb-3">
                                        <input
                                            type="number"
                                            step="any"
                                            class="form-control mr-3"
                                            name="normAzotMin"
                                            placeholder="Введите min значение"
                                            @if(isset($_GET['normAzotMin']))
                                                value="{{$_GET['normAzotMin']}}"
                                            @else
                                                value="{{$normAzotMin}}"
                                            @endif
                                        >
                                        <input
                                            type="number"
                                            step="any"
                                            class="form-control ml-3"
                                            name="normAzotMax"
                                            placeholder="Введите max значение"
                                            @if(isset($_GET['normAzotMax']))
                                                value="{{$_GET['normAzotMax']}}"
                                            @else
                                                value="{{$normAzotMax}}"
                                            @endif
                                        >
                                    </div>

                                    <label class="mb-n1">Нормы фосфора</label>
                                    <div class="d-flex flex-row mb-3">
                                        <input
                                            type="number"
                                            step="any"
                                            class="form-control mr-3"
                                            name="normFosforMin"
                                            placeholder="Введите min значение"
                                            @if(isset($_GET['normFosforMin']))
                                                value="{{$_GET['normFosforMin']}}"
                                            @else
                                                value="{{$normFosforMin}}"
                                            @endif
                                        >
                                        <input
                                            type="number"
                                            step="any"
                                            class="form-control ml-3"
                                            name="normFosforMax"
                                            placeholder="Введите max значение"
                                            @if(isset($_GET['normFosforMax']))
                                                value="{{$_GET['normFosforMax']}}"
                                            @else
                                                value="{{$normFosforMax}}"
                                            @endif
                                        >
                                    </div>


                                    <label class="mb-n1">Нормы калия</label>
                                    <div class="d-flex flex-row mb-3">
                                        <input
                                            step="any"
                                            type="number"
                                            name="normKaliiMin"
                                            placeholder="Введите min значение"
                                            class="form-control mr-3"
                                            @if(isset($_GET['normKaliiMin']))
                                                value="{{$_GET['normKaliiMin']}}"
                                            @else
                                                value="{{$normKaliiMin}}"
                                            @endif
                                        >
                                        <input
                                            step="any"
                                            type="number"
                                            name="normKaliiMax"
                                            placeholder="Введите max значение"
                                            class="form-control ml-3"
                                            @if(isset($_GET['normKaliiMax']))
                                                value="{{$_GET['normKaliiMax']}}"
                                            @else
                                                value="{{$normKaliiMax}}"
                                            @endif
                                        >
                                    </div>


                                    <button class="btn btn-info w-50 mb-3">Установить фильтры</button>


                                </form>

                                <form action="{{route('admin.fertilizer.index')}}" method="get">
                                    <button class="btn btn-info w-50 mb-3">Сбросить все фильтры</button>
                                </form>

                            </div>
                            @endif


                        </div>
@endsection
