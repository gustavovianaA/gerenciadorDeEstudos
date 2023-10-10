<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar" style="margin-top:0">
        <!-- Sidebar user panel (optional) -->
        @if ($profile != null)
        <div class="user-panel mt-3 pb-3 mb-3 btn btn-light">

            <a href="{{ route('profile.show' , ['profile' => $profile->id])}}">
                <div class="image" style="display: block ; padding-left: 0">
                    <img src="{{ asset($profile->image) }}" style="width: 100%" class="rouded elevation-2" alt="User Image">
                </div>
                <div class="info" style="display: block">
                    <p style="color: #000" class="d-block">{{ $profile->name }}</p>
                </div>
            </a>
        </div>
        @endif

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

                <!--
       <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
            -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Perfil
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('profile.index') }}" class="nav-link">
                                <i class="fas fa-check-square nav-icon"></i>
                                <p>Selecionar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('profile.create') }}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Criar Novo</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @if ($profile != null)
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-flag"></i>
                        <p>
                            Fases
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('phase.index') }}" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>Ver Fases</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('phase.create') }}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Criar Nova</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-pen"></i>
                        <p>
                            Tópicos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('topic.index') }}" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>Ver Tópicos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('topic.create') }}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Criar Novo</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <li class="nav-header">AÇÕES</li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Sair
                        </p>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        <hr>
        <div class="text-center">
            <img style="width: 50px; height: auto" src="{{ asset('img/app/logo.png') }}" alt="Gerenciador de Estudos Logo" class="elevation-3 mb-2" style="opacity: .8">
            <h3 class="text-white text-center">Gerenciador de Estudos</h3>
        </div>
        <hr>
    </div>
    <!-- /.sidebar -->

</aside>
