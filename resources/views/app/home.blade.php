@extends('app.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Painel de Controle</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('app.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Painel de Controle</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            @if ($profile != null)
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1" style="width: 50%"><img src="{{ asset($profile->image) }}"></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Perfil</span>
                            <span class="info-box-number">
                                {{ $profile->name }}

                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-4">
                    <a class="btn btn-outline-primary" href="{{ route('profile.index') }}">
                        Trocar Perfil
                    </a>
                </div>

            </div>
            <!-- /.row -->

            <!-- Main content -->
            <section class="content">
                <div class="container">

                    <div class="row">
                        <div class="col-md-4">

                            <h5>Descrição:</h5>
                            <p>{{ $profile->description }}</p>
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <h5>Fases:</h5>
                            @foreach($profile->phases as $phase)
                            <a href="{{ route('phase.show', ['phase' => $phase]) }}">
                                <button class="btn btn-primary mb-2 mr-2">{{ $phase->name }}</button>
                            </a>
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <h5>Tópicos:</h5>
                            @foreach($profile->topics as $topic)
                            <a href="{{ route('topic.show', ['topic' => $topic]) }}">
                                <button class="btn btn-success mb-2 mr-2">{{ $topic->name }}</button>
                            </a>
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <h5>Cadernos:</h5>
                            @foreach($profile->notes as $note)
                            <a href="{{ route('note.show', ['note' => $note]) }}">
                                <button class="btn btn-dark mb-2 mr-2">{{ $note->name }}</button>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
            @endif




        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
