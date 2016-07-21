@extends('layouts.masterComplete')

@section('title', 'Editar Estado')

@section('styles')
    @parent
    
@stop

@section('scripts')

    requestPrioritiesController.edit();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h2>Editar Prioridad</h2></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    
                     {!! Form::model($priority, [ 'route'=> ['requestsPriorities.update', $priority->id], 'method' => 'PATCH' ,'id' => 'editRequestPriorityForm']) !!}

                        @include('admin.priorities.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                    <br>

                    
                    @if($priority->requests()->count() == 0)
                         {!! Form::open(['route'=> ['requestsPriorities.destroy', $priority->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger pull-right">Eliminar
                                        </button>
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route'=> ['requestsPriorities.destroy', $priority->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger pull-right" disabled>Eliminar
                                        </button>
                                       
                    {!! Form::close() !!}
                    @endif
                    
                    
                </div><!--.panel-body-->
                
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
