
@extends('layouts.masterComplete')

@section('title', 'Colonias')

@section('scripts')
    $('select').select2();
@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h2>{{ $colony->name }}</h2></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    <p><h3>
                        Codigo Postal : {{ $colony->zip }} <br>
                        Asentamiento : {{ $colony->colonyScopes->name }} <br>
                        Ambito :{{ $colony->settlementTypes->name }} <br>

                    </h3></p>

                    <small>Creado el:{{ $colony->created_at }}</small><br>

                    <small>Ultima Edicion: {{ $colony->updated_at }}</small>
                
                    <div class="form-buttons form-group clearfix">
                    <div class="row">
                        <div class="col-md-12">
                            @unless(isset($onlySaveButton) && $onlySaveButton)
                                <a href="{{ route('colonies.edit', $colony->id) }}" class="btn btn-primary">Editar</a>
                                <a href="{{ route('colonies.index') }}" class="btn btn-warning">Regresar</a>
                                {!! Form::open(['route'=> ['colonies.destroy', $colony->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger">Eliminar
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                    </div>
                </div><!--.panel-body-->
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->

@stop