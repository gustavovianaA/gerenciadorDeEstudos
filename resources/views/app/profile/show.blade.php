@extends('app.layouts.app')

@section('content')
<div class="content-wrapper">
    <div>
        @include('app.profile.__partials.menu')
    </div>
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Perfil: {{ $profile->name }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('app.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Ver Fase</li>
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
                <div class="col-md-4">
                    <h5>Imagem</h5>
                    <img class="img-fluid" src="{{ asset($profile->image) }}" alt="{{ $profile->name}}">
                    <hr>
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
</div>



@endsection

@section('scripts')

@endsection
