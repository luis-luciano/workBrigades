
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
                    <small>Creado el:{{ $colony->created_at }}</small><br>
                    <small>Ultima Edicion: {{ $colony->updated_at }}</small>
                    {!! Form::model($colony, [ 'route'=> ['colonies.update', $colony->id], 'method' => 'PATCH']) !!}

                        @include('admin.colonies.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                    <br>
                    {!! Form::open(['route'=> ['colonies.destroy', $colony->id ], 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger">Eliminar
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                    {!! Form::close() !!}
                </div><!--.panel-body-->
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->

@stop