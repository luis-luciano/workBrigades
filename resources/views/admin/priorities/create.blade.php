
@extends('layouts.masterComplete')

@section('title', 'Crear Estado')

@section('scripts')
    requestPrioritiesController.create();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>Crear Nivel de Prioridad</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    {!! Form::open(['route' => 'requestsPriorities.store','method' => 'post' ,'id' => 'createRequestPriorityForm']) !!}
                        @include('admin.priorities.form', ['submitButtonText' => 'Guardar'])
                    {!! Form::close() !!}
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop