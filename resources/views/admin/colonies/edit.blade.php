
@extends('layouts.masterComplete')

@section('title', 'Colonias')

@section('scripts')
    $('select').select2();
    coloniesController.edit();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4></h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    {!! Form::model($colony, [ 'route'=> ['colonies.update', $colony->id], 'method' => 'PATCH', 'id' => 'editColonyForm']) !!}

                        @include('admin.colonies.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                    <br>

                    @if($colony->personalInformation()->count() == 0)
                         {!! Form::open(['route'=> ['colonies.destroy', $colony->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger">Eliminar
                                        
                                        </button>
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route'=> ['colonies.destroy', $colony->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger " disabled>Eliminar
                                        
                                        </button>
                    {!! Form::close() !!}
                    @endif
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->

@stop