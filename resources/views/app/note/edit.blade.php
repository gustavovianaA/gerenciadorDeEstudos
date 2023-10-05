@extends('app.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar Fase</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('app.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Nova Fase</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @component('app.note.__components.form_create_edit' , ['topic_id' => $topic_id , 'note' => $note])
            @endcomponent

        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
