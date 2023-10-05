@extends('app.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gerenciar Perfis</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('app.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Perfis</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div>
        @include('app.profile.__partials.menu')
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                @if ($available_profiles->isEmpty())
                <h2>Por favor crie um perfil para começar</h2>
                @endif

                @foreach ($available_profiles as $available_profile)
                <div class="col-md-3">
                    @if ($profile != null)
                    <div class="profiles {{ $profile->id == $available_profile->id ? 'profile-selected' : '' }} px-3 py-4 text-center rounded">
                        @else
                        <div class="profiles px-3 py-4 text-center rounded">
                            @endif
                            <img class="img-fluid rounded" src="{{ asset($available_profile->image) }}">
                            <h3 class="py-3">{{ $available_profile->name }}</h3>

                            @if ($profile === null)
                            <div class="d-grid gap-2">
                                <a href="{{ route('profile.select', ['profile_id' => $available_profile->id]) }}">
                                    <div class="mb-2 btn btn-primary d-block">
                                        Selecionar Perfil
                                    </div>
                                </a>
                            </div>
                            @else
                            @if ($profile->id != $available_profile->id)
                            <div class="d-grid gap-2">
                                <a href="{{ route('profile.select', ['profile_id' => $available_profile->id]) }}">
                                    <div class="mb-2 btn btn-primary d-block">
                                        Selecionar Perfil
                                    </div>
                                </a>
                            </div>
                            @endif
                            @endif

                            <div class="d-grid gap-2">
                                <a href="{{ route('profile.show', ['profile' => $available_profile->id]) }}">
                                    <div class="mb-2 btn btn-primary d-block">
                                        Ver Perfil
                                    </div>
                                </a>
                            </div>
                            <div class="d-grid gap-2">
                                <a href="{{ route('profile.edit', ['profile' => $available_profile->id]) }}">
                                    <div class="mb-2 btn btn-primary d-block">
                                        Editar Perfil
                                    </div>
                                </a>
                            </div>
                            <div class="d-grid gap-2">
                                <div class="mb-2 btn btn-danger d-block">
                                    Excluir Perfil
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
            <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
