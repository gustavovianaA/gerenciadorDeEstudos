@extends('app.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Gerenciar Tópicos</h1>
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
            @include('app.topic.__partials.menu')
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">

                    @if ($topics->isEmpty())
                        <h3>Não há tópicos para mostrar</h3>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Fases</th>
                                    <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($topics as $key => $topic)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                        <a href="{{ route('topic.show', ['topic' => $topic]) }}">
                                                <button class="btn btn-outline-success"> {{ $topic->name}}</button>
                                            </a>
                                        </td>
                                        <td>
                                            @foreach ($topic->phases as $phase)
                                                <a href="{{ route('phase.show', ['phase' => $phase]) }}">
                                                    <button class="btn btn-primary">
                                                        {{ $phase->name }}
                                                    </button>
                                                </a>
                                            @endforeach
                                        </td>

                                        <td>
                                            <a href="{{ route('topic.show', ['topic' => $topic]) }}">
                                                <button class="btn btn-success"> Ver</button>
                                            </a>
                                            <a href="{{ route('topic.edit', ['topic' => $topic]) }}">
                                                <button class="btn btn-primary"> Editar</button>
                                            </a>
                                            <button class="btn btn-danger"> Excluir</button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @endif
                </div>

            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
