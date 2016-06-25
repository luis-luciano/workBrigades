
@extends('layouts.masterComplete')

@section('title', 'Crear Supervicion')

@section('scripts')
    
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>Supervicion</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    {!! Form::open(['route' => 'supervisions.store', 'id' => 'createUserForm']) !!}
                        @include('admin.supervisions.form', ['submitButtonText' => 'Guardar'])
                    {!! Form::close() !!}
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop