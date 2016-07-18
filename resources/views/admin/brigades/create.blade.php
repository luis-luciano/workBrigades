
@extends('layouts.masterComplete')

@section('title', 'Crear Tipo de Captura')

@section('scripts')
    brigadesController.create();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>BRIGADA</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                 @include('errors.list')
                    {!! Form::open(['route' => 'brigades.store','method' => 'post' ,'id' => 'createBrigadeForm']) !!}
                        @include('admin.brigades.form', ['submitButtonText' => 'Guardar'])
                    {!! Form::close() !!}
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop