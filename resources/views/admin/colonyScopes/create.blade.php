
@extends('layouts.masterComplete')

@section('title', 'Crear Ambito')

@section('scripts')
    colonyScopesCotroller.create();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>Ámbito</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    {!! Form::open(['route' => 'colonies.scopes.store', 'id' => 'createColonyScopeForm']) !!}
                        @include('admin.colonyScopes.form', ['submitButtonText' => 'Guardar'])
                    {!! Form::close() !!}
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop