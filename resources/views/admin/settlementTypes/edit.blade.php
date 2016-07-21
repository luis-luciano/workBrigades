@extends('layouts.masterComplete')

@section('title', 'Editar Asentamiento')

@section('styles')
    @parent
    
@stop

@section('scripts')
    settlementTypesController.edit();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h2>Tipo de Acentamiento</h2></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    
                     {!! Form::model($settlement, [ 'route'=> ['colonies.settlement-types.update', $settlement->id], 'method' => 'PATCH', 'id' => 'editSettlementTypeForm']) !!}

                        @include('admin.settlementTypes.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                    <br>

                    @if($settlement->Colonies()->count() == 0)
                         {!! Form::open(['route'=> ['colonies.settlement-types.destroy', $settlement->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger pull-right">Eliminar
                                        </button>
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route'=> ['colonies.settlement-types.destroy', $settlement->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger pull-right" disabled>Eliminar
                                        </button>
                                       
                    {!! Form::close() !!}
                    @endif
                    
                </div><!--.panel-body-->
                
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
