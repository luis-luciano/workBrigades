@extends('layouts.masterComplete')

@section('title', 'Editar Tipo de Captura')

@section('styles')
    @parent
    
@stop

@section('scripts')
    captureTypesController.edit();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h2>Editar Tipo de Captura</h2></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    
                     {!! Form::model($captureType, [ 'route'=> ['captureTypes.update', $captureType->id], 'method' => 'PATCH' ,'id' => 'editCaptureTypeForm']) !!}

                        @include('admin.captureTypes.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                    <br>

                    
                         
                        {!! Form::open(['route'=> ['captureTypes.destroy', $captureType->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger pull-right" >Eliminar
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                       
                        {!! Form::close() !!} 
                    
                    
                </div><!--.panel-body-->
                
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
