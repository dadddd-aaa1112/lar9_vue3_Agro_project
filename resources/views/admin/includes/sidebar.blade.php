<div class="d-flex justify-content-between align-content-center ">
    <div>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('admin')}}" class="nav-link">На главную</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="d-flex align-self-center">
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-none nav-link text-danger">Выйти</button>
        </form>


    </div>
</div>

<aside class="main-sidebar sidebar-dark-primary elevation-4">




  <a href="{{route('admin')}}" class="brand-link">
      <span class="brand-text font-weight-light">Административная панель</span>
  </a>

  <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- SidebarSearch Form -->


      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
              <a href="{{route('admin.client.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-user-tie"></i>
                  <p>
                      Клиенты
                  </p>
              </a>
          </li>

          <li class="nav-item">
              <a href="{{route('admin.culture.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-kiwi-bird"></i>
                  <p>
                      Культуры
                  </p>
              </a>
          </li>

          <li class="nav-item">
              <a href="{{route('admin.fertilizer.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-bug"></i>
                  <p>
                      Удобрения
                  </p>
              </a>
          </li>

          <li class="nav-item">
              <a href="{{route('admin.user.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-user-friends"></i>
                  <p>
                      Пользователи
                  </p>
              </a>
          </li>


      </ul>
      <!-- /.sidebar-menu -->
  </div>

</aside>
