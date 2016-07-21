@extends('layouts.masterComplete')

@section('title', 'Editar Tipologia')

@section('styles')
    @parent
    
@stop

@section('scripts')
    typologiesController.edit();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h2>Editar Tipologia</h2></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    
                     {!! Form::model($typology, [ 'route'=> ['typologies.update', $typology->id], 'method' => 'PATCH' ,'id' => 'editTypologyForm']) !!}

                        @include('admin.typologies.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                    <br>

                    
                        <!-- 
                        {!! Form::open(['route'=> ['typologies.destroy', $typology->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger pull-right" >Eliminar
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                       
                        {!! Form::close() !!} -->
                    
                    
                </div><!--.panel-body-->
                
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
