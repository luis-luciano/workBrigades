@extends('layouts.masterComplete')

@section('title', 'Editar Ambitos')

@section('styles')
    @parent
    
@stop

@section('scripts')
    colonyScopesCotroller.edit();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h2>Ambito</h2></div>
                </div><!--.panel-heading-->
                <div class="panel-body">

                    {!! Form::model($scope, [ 'route'=> ['colonies.scopes.update', $scope->id], 'method' => 'PATCH', 'id' => 'editColonyScopeForm']) !!}

                        @include('admin.colonyScopes.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                    <br>

                    @if($scope->colonies()->count() == 0)
                         {!! Form::open(['route'=> ['colonies.scopes.destroy', $scope->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger pull-right">Eliminar
                                       
                                        </button>
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route'=> ['colonies.scopes.destroy', $scope->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger pull-right" disabled>Eliminar
                                       
                                        </button>
                    {!! Form::close() !!}
                    @endif
                    
                </div><!--.panel-body-->
                
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
