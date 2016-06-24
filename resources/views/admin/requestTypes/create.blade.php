
@extends('layouts.masterComplete')

@section('title', 'Crear Tipo de Captura')

@section('scripts')
    
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>TIPO DE CAPTURA</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    {!! Form::open(['route' => 'captureTypes.store','method' => 'post' ,'id' => 'createUserForm']) !!}
                        @include('admin.captureTypes.form', ['submitButtonText' => 'Guardar'])
                    {!! Form::close() !!}
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop