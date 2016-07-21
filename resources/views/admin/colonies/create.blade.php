
@extends('layouts.masterComplete')

@section('title', 'Crear Colonias')

@section('scripts')
    $('select').select2();
    coloniesController.create();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4></h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    {!! Form::open(['route' => 'colonies.store', 'id' => 'createColonyForm']) !!}
                        @include('admin.colonies.form', ['submitButtonText' => 'Guardar'])
                    {!! Form::close() !!}
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->

@stop