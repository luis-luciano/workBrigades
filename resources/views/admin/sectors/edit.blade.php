@extends('layouts.masterComplete')

@section('title', 'Editar Sector')

@section('styles')
    @parent
    
@stop

@section('scripts')
    sectorsController.edit();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h2>Sector</h2></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    

                    {!! Form::model($sector, [ 'route'=> ['sectors.update', $sector->id], 'method' => 'PATCH', 'id' => 'createSectorForm']) !!}

                        @include('admin.sectors.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                <br>

                    @if($sector->Colonies()->count() == 0)
                         {!! Form::open(['route'=> ['sectors.destroy', $sector->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger pull-right">Eliminar
                                        </button>
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route'=> ['sectors.destroy', $sector->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger pull-right" disabled>Eliminar
                                        </button>
                                       
                    {!! Form::close() !!}
                    @endif
                    
                </div><!--.panel-body-->
                
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
