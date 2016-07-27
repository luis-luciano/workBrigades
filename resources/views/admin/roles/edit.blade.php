@extends('layouts.masterComplete')

@section('title', 'Editar roles')

@section('styles')
    @parent
    
@stop

@section('scripts')
    rolesController.edit();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h2>roles</h2></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    

                    {!! Form::model($role, [ 'route'=> ['roles.update', $role->id], 'method' => 'PATCH', 'id' => 'deleteRolButton']) !!}

                        @include('admin.roles.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                <br>
                {!! Form::open(['route'=> ['roles.destroy', $role->id ], 'method' => 'DELETE', 'id' => 'deleteRoleForm']) !!}
                                        <button id="deleteRolButton" type="submit" class="btn btn-danger pull-right" >Eliminar
                                        
                                        </button>
                                       
                    {!! Form::close() !!}
                    
                </div><!--.panel-body-->
                
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
