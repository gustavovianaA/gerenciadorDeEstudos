@extends('app.layouts.app')

@section('content')
<div class="content-wrapper">
    <div>
        @include('app.phase.__partials.menu')
    </div>
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Fase: {{ $phase->name }}</h1>
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
                <div class="col-md-8">
                    <h5>Status:</h5>
                    <p>{{ $phase->status }}</p>
                    <hr>
                    <h5>Descrição:</h5>
                    <p>{{ $phase->description }}</p>
                    <hr>
                    <h5>Meta:</h5>
                    <p>{{ $phase->goal }}</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Data de início:</h5>
                            <p>{{ $phase->start_date->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-md-4">
                            <h5>Data Prevista para o fim:</h5>
                            <p>{{ $phase->expected_end_date->format('d/m/Y') }}</p>
                        </div>
                        @if ($phase->end_date != null)
                        <div class="col-md-4">
                            <h5>Data do fim:</h5>
                            <p>{{ $phase->end_date->format('d/m/Y') }}</p>
                        </div>
                        @endif
                    </div>
                    <hr>
                    <h5 class="mb-3">Cadernos da fase:</h5>
                    <div class="row">
                        

                        @foreach ($phase->topics as $topic)
                        @foreach($topic->notes as $note)
                        <a href="{{ route('note.show', ['note' => $note->id]) }}">
                            <button class="btn btn-dark mb-2 mr-2">
                                <i class="fa fa-book mr-2"></i>{{ $note->name }}
                            </button>
                        </a>
                        @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Tópicos:</h5>
                    @foreach ($phase->topics as $topic)
                    <a href="{{ route('topic.show', ['topic' => $topic]) }}">
                        <button class="btn btn-success mb-2 mr-2">{{ $topic->name }}</button>
                    </a>
                    @endforeach
                    <button class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#exampleModal">Adicionar Tópico +</button>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Tópico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="phase_identifier" phase_id="{{ $phase->id }}">
                    <section>
                        <h3>Tópicos Adicionados:</h3>
                        <div id="main_topics">
                            @foreach ($phase->topics as $topic)
                            <button topic_id="{{ $topic->id }}" class="main-topic btn btn-success mb-2 mr-2">{{ $topic->name }}</button>
                            @endforeach
                        </div>
                    </section>

                    <section>
                        <h3>Adicionar Tópicos:</h3>
                        <div id="other_topics">
                            @foreach ($available_topics as $available_topic)
                            <button topic_id="{{ $available_topic->id }}" class="available-topic btn btn-success mb-2 mr-2">{{ $available_topic->name }}</button>
                            @endforeach
                        </div>
                    </section>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button id="modalSaveTopics" type="button" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
    <script src="{{ asset('js/app/phase.js') }}"></script>
    @endsection
