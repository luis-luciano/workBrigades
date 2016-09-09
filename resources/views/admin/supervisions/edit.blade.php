@extends('layouts.masterComplete')

@section('title', 'Editar Supervicion')

@section('styles')
    @parent
    
@stop

@section('scripts')
    supervisionsController.edit();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h2>Supervicion</h2></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    

                    {!! Form::model($supervision, [ 'route'=> ['supervisions.update', $supervision->id], 'method' => 'PATCH' , 'id' => 'editSupervisionForm']) !!}

                        @include('admin.supervisions.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                    <br>
                    
                    <br>
                    @if($supervision->requests()->count() == 0)
                         {!! Form::open(['route'=> ['supervisions.destroy', $supervision->id ], 'method' => 'DELETE']) !!}
                                        <button id="deleteRequestsupervisionButton" type="submit" class="btn btn-danger pull-right">Eliminar
                                        </button>
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route'=> ['supervisions.destroy', $supervision->id ], 'method' => 'DELETE']) !!}
                                        <button id="deleteRequestsupervisionButton" type="submit" class="btn btn-danger pull-right" disabled>Eliminar
                                        </button>
                                       
                    {!! Form::close() !!}
                    @endif
               
                    
                </div><!--.panel-body-->
                
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
