@extends('layouts.masterComplete')

@section('title', 'Editar brigada')

@section('styles')
    @parent
    
@stop

@section('scripts')
    $('select').select2();
    brigadesController.edit();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h2>Editar Brigada</h2></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    
                     {!! Form::model($brigade, [ 'route'=> ['brigades.update', $brigade->id], 'method' => 'PATCH' ,'id' => 'editBrigadeForm']) !!}

                        @include('admin.brigades.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                    <br>
                    @if($brigade->requests()->count() == 0 && $brigade->sectors()->count() == 0 && $brigade->typologies()->count() == 0)
                         {!! Form::open(['route'=> ['brigades.destroy', $brigade->id ], 'method' => 'DELETE']) !!}
                                        <button id="deleteBrigadeButton" type="submit" class="btn btn-danger pull-right">Eliminar
                                        </button>
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route'=> ['brigades.destroy', $brigade->id ], 'method' => 'DELETE']) !!}
                                        <button id="deleteBrigadeButton" type="submit" class="btn btn-danger pull-right" disabled>Eliminar
                                        </button>
                                       
                    {!! Form::close() !!}
                    @endif

                    
                         
                        
                    
                    
                </div><!--.panel-body-->
               
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
