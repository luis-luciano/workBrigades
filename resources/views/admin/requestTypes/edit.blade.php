@extends('layouts.masterComplete')

@section('title', 'Editar Tipo de Peticion')

@section('styles')
    @parent
    
@stop

@section('scripts')
    requestTypesController.edit();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h2>Editar Tipo de Peticion</h2></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    
                     {!! Form::model($requestType, [ 'route'=> ['requestTypes.update', $requestType->id], 'method' => 'PATCH' ,'id' => 'editRequestTypeForm']) !!}

                        @include('admin.requestTypes.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                    <br>
                    @if($requestType->requests()->count() == 0)
                         {!! Form::open(['route'=> ['requestTypes.destroy', $requestType->id ], 'method' => 'DELETE']) !!}
                                        <button id="deleteRequestrequestTypeButton" type="submit" class="btn btn-danger pull-right">Eliminar
                                        </button>
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route'=> ['requestTypes.destroy', $requestType->id ], 'method' => 'DELETE']) !!}
                                        <button id="deleteRequestrequestTypeButton" type="submit" class="btn btn-danger pull-right" disabled>Eliminar
                                        </button>
                                       
                    {!! Form::close() !!}
                    @endif
                    
                </div><!--.panel-body-->
                
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
