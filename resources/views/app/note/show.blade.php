@extends('app.layouts.app')

@section('content')
<div class="content-wrapper">
    <div>
        @include('app.note.__partials.menu')
    </div>
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Caderno: {{ $note->name }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('app.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('topic.index') }}">Tópicos</a></li>
                        <li class="breadcrumb-item active">Ver Caderno</li>
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
                <div class="col-md-9 px-5 py-3" style="background-color: #fff; border: 3px solid #000; height: 100%">
                    {!! $note->content !!}
                </div>

                <div class="col-md-3">
                    <a href="{{ route('note.edit' , ['note' => $note]) }}">
                        <button class="btn btn-primary btn-block mb-2">Editar Caderno</button>
                    </a>
                    <a href="{{ route('note.print.pdf' , ['note' => $note])}}">
                        <button class="btn btn-primary btn-block mb-2">Exportar PDF</button>
                    </a>
                    <hr>
                    <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#exampleModal">Excluir Caderno</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Exluir caderno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseja realmente excluir o caderno?</p>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form id="form_{{$note->id}}" method="post" action="{{ route('note.destroy', ['note' => $note->id]) }}">
                    @method('DELETE')
                    @csrf
                    <!--<button type="submit">Excluir</button>-->
                    <a class="btn btn-danger" href="#" onclick="document.getElementById('form_{{$note->id}}').submit()">Excluir Caderno</a>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Latex for math text -->
<!--
<script type="text/x-mathjax-config">
  MathJax.Hub.Config({tex2jax: {inlineMath: [['|','|'], ['\\(','\\)']]}});
</script>
<script type="text/javascript"
  src="http://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
</script>
-->
@endsection
