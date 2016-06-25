
@extends('layouts.masterComplete')

@section('title', 'Crear Tipo de Problema')

@section('scripts')
    
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>TIPO DE PROBLEMA</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    {!! Form::open(['route' => 'problemTypes.store','method' => 'post' ,'id' => 'createUserForm']) !!}
                        @include('admin.problemTypes.form', ['submitButtonText' => 'Guardar'])
                    {!! Form::close() !!}
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop