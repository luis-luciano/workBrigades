@extends('layouts.masterComplete')

@section('title', 'Editar Tipo de Problema')

@section('styles')
    @parent
    
@stop

@section('scripts')
    $('select').select2();
    problemTypesController.edit();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h2>Editar Tipo de Problema</h2></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    
                     {!! Form::model($problemType, [ 'route'=> ['problemTypes.update', $problemType->id], 'method' => 'PATCH' ,'id' => 'editProblemTypeForm']) !!}

                        @include('admin.problemTypes.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                    <br>

                    
                         
                        {!! Form::open(['route'=> ['problemTypes.destroy', $problemType->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger pull-right" >Eliminar
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                       
                        {!! Form::close() !!} 
                    
                    
                </div><!--.panel-body-->
                
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
