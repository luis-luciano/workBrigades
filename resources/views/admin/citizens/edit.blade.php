
@extends('layouts.masterComplete')

@section('title', 'Ciudadanos')

@section('scripts')
    $('select').select2();
@stop

@section('content')
<div class="panel">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>{{ singular('citizens') }}</h4>
            </div>
            <ul class="nav nav-tabs with-panel nav-justified">
                <li class="active"><a href="#citizen" data-toggle="tab" class="btn-ripple">{{ singular('citizens') }}</a></li>
                <li><a href="#requests" data-toggle="tab" class="btn-ripple">{{ plural('requests') }}</a></li>
            </ul>
        </div><!--.panel-heading-->
        <div class="panel-body">
            <div class="tab-content with-panel">
                <div id="citizen" class="tab-pane active">
                    <div class="form-buttons buttons-on-top clearfix">
                        <div class="pull-right">
                            {!! Form::open(['route' => ['citizens.destroy', $citizen->id], 'method' => 'DELETE', 'id' => 'deleteCitizenForm']) !!}
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger', 'id' => 'deleteCitizenButton']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    {!! Form::model($citizen, ['route' => ['citizens.update', $citizen->id], 'method' => 'PATCH' ,'id' => 'editCitizenForm']) !!}
                        @include('admin.citizens.form', ['submitButtonText' => 'Actualizar', 'type' => 'edit'])
                    {!! Form::close() !!}
                </div><!--.tab-pane-->
                {{-- <div id="requests" class="tab-pane">
                    @include('partials.requests.table', ['baseRequestRoute' => route('requests.edit',1), 'citizenName'=>false])
                </div><!--.tab-pane--> --}}
            </div><!--.tab-content-->
        </div><!--.panel-body-->
    </div><!--.panel-->
@stop
