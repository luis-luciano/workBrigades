
@extends('layouts.masterComplete')

@section('title', 'Crear Tipo de Peticion')

@section('scripts')
    requestTypesController.create();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>TIPO DE PETICION</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    {!! Form::open(['route' => 'requestTypes.store','method' => 'post' ,'id' => 'createRequestTypeForm']) !!}
                        @include('admin.requestTypes.form', ['submitButtonText' => 'Guardar'])
                    {!! Form::close() !!}
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop