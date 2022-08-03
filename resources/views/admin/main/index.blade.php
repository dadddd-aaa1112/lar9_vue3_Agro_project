@extends('admin.layouts.main')
@section('content')

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

        <!-- /.content-header -->

        <!-- Main content -->

                <!-- Small boxes (Stat box) -->
                <div class="row p-3">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$fertilizers}}</h3>

                                <p>Удобрения</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-frog"></i>
                            </div>
                            <a href="{{route('admin.fertilizer.index')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$clients}}</h3>

                                <p>Клиенты</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <a href="{{route('admin.client.index')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$users}}</h3>

                                <p>Пользователи</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{route('admin.user.index')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$cultures}}</h3>

                                <p>Культуры</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-bug"></i>
                            </div>
                            <a href="{{route('admin.culture.index')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->

                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->

                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->

        <!-- /.content -->



@endsection
