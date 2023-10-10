@extends('app.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div>
            @include('app.topic.__partials.menu')
        </div>
        <!-- Content Header (Page header) -->

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tópico: {{ $topic->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('app.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('topic.index') }}">Topicos</a>
                            <li class="breadcrumb-item active">Ver Tópico</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->



        <!-- Main content -->
        <section class="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-8">
                        <h5>Descrição:</h5>
                        <p>{{ $topic->description }}</p>
                        <hr>
                        <h5>Cadernos:</h5>
                        <div class="row">
                            @foreach ($topic->notes as $note)
                                <div class="col-6 col-sm-3 text-center">
                                    <a href="{{ route('note.show', ['note' => $note]) }}">
                                        <div class="p-3 rounded" style="color: #fff; background-color: #000">
                                            <p class="pb-2 m-0">{{ $note->name }}</p>
                                            <i class="fa fa-book fa-5x" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <h5>Fases:</h5>
                        @foreach ($topic->phases as $phase)
                            <a href="{{ route('phase.show', ['phase' => $phase]) }}">
                                <button class="btn btn-success mb-2 mr-2">{{ $phase->name }}</button>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
