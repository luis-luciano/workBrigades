@extends('layouts.masterComplete')

@section('title', 'Editar Estado')

@section('styles')
    @parent
    
@stop

@section('scripts')

@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h2>Editar Permiso</h2></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    
                     {!! Form::model($permission, [ 'route'=> ['permissions.update', $permission->id], 'method' => 'PATCH']) !!}

                        @include('admin.permissions.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                    <br>
                    @if($permission->roles()->count() == 0)
                         {!! Form::open(['route'=> ['permissions.destroy', $permission->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger">Eliminar
                                        
                                        </button>
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route'=> ['permissions.destroy', $permission->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger " disabled>Eliminar
                                        
                                        </button>
                    {!! Form::close() !!}
                    @endif

                    
                       
                    
                </div><!--.panel-body-->
                
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
