@extends('app.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Gerenciar Fases</h1>
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
            @include('app.phase.__partials.menu')
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">

                    @if ($phases->isEmpty())
                        <h3>Não há fases para mostrar</h3>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Data de início</th>
                                    <th scope="col">Data prevista para o fim</th>
                                    <th scope="col">Data do fim</th>
                                    <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($phases as $key => $phase)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                        <a href="{{ route('phase.show', ['phase' => $phase]) }}">
                                                <button class="btn btn-outline-success"> {{$phase->name}} </button>
                                            </a>
                                        </td>
                                        <td>{{ $phase->status }}</td>
                                        <td>{{ $phase->start_date->format('d/m/Y') }}</td>
                                        <td>{{ $phase->expected_end_date->format('d/m/Y') }}</td>
                                        <td>
                                            @if ($phase->end_date != null)
                                                {{ $phase->end_date->format('d/m/Y') }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('phase.show', ['phase' => $phase]) }}">
                                                <button class="btn btn-success"> Ver</button>
                                            </a>
                                            <a href="{{ route('phase.edit', ['phase' => $phase]) }}">
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
