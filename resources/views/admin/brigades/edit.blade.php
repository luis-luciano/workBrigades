@extends('layouts.masterComplete')

@section('title', 'Editar brigada')

@section('styles')
    @parent
    
@stop

@section('scripts')
    $('select').select2();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h2>Editar Brigada</h2></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    
                     {!! Form::model($brigade, [ 'route'=> ['brigades.update', $brigade->id], 'method' => 'PATCH']) !!}

                        @include('admin.brigades.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                    <br>

                    
                         
                        {!! Form::open(['route'=> ['brigades.destroy', $brigade->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger pull-right" >Eliminar
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                       
                        {!! Form::close() !!} 
                    
                    
                </div><!--.panel-body-->
                
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
