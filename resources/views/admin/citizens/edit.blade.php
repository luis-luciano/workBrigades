
@extends('layouts.masterComplete')

@section('title', 'Ciudadanos')

@section('scripts')
    //citizensController.edit();
    $('select').select2();
@stop

@section('content')
<div class="panel">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>Ciudadano</h4>
            </div>
        </div><!--.panel-heading-->
        <div class="panel-body">
                                              
                  {!! Form::model($citizen, ['route' => ['citizens.update', $citizen->id], 'method' => 'PATCH' ,'id' => 'editCitizenForm']) !!}
                        @include('admin.citizens.form', ['submitButtonText' => 'Actualizar', 'type' => 'edit'])
                    {!! Form::close() !!}
                </div><!--.tab-pane-->
            </div><!--.tab-content-->
        </div><!--.panel-body-->
    </div><!--.panel-->
@stop
