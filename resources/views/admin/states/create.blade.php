
@extends('layouts.masterComplete')

@section('title', 'Crear Estado')

@section('scripts')
    requestStatesController.create();
    
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>Tipos de Estado</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    {!! Form::open(['route' => 'requestsStates.store','method' => 'post' ,'id' => 'createRequestStateForm']) !!}
                        @include('admin.states.form', ['submitButtonText' => 'Guardar'])
                    {!! Form::close() !!}
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop