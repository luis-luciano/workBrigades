
@extends('layouts.masterComplete')

@section('title', 'Ciudadanos')

@section('scripts')
    $('select').select2();
    citizensController.create();
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>Ciudadanos</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    {!! Form::open(['route' => 'citizens.store', 'id' => 'createCitizenForm']) !!}
                        @include('admin.citizens.form', ['submitButtonText' => 'Guardar', 'type' => 'create'])
                    {!! Form::close() !!}
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop