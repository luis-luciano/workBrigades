
@extends('layouts.masterComplete')

@section('title', 'Crear Serctor')

@section('scripts')
    
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>Sector</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    {!! Form::open(['route' => 'sectors.store', 'id' => 'createUserForm']) !!}
                        @include('admin.sectors.form', ['submitButtonText' => 'Guardar'])
                    {!! Form::close() !!}
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop