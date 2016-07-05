@extends('layouts.masterComplete')

@section('title', 'Editar Estado')

@section('styles')
    @parent
    
@stop

@section('scripts')
    requestStatesController.edit();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h2>Editar Estado</h2></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    
                     {!! Form::model($state, [ 'route'=> ['requestsStates.update', $state->id], 'method' => 'PATCH', 'id' => 'editRequestStateForm']) !!}

                        @include('admin.states.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                    <br>

                    
                        {!! Form::open(['route'=> ['requestsStates.destroy', $state->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger pull-right" >Eliminar
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                       
                    {!! Form::close() !!}
                    
                    
                </div><!--.panel-body-->
                
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
