@extends('pages.public.layouts.openMaster')

@section('title', 'Peticion Publica')

@section('content')
<div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>Nueva Petición</h4>
                                </div>
                            </div><!--.panel-heading-->
                            <div class="panel-body">
                                {!! Form::open(['route' => 'Peticion-publica.store', 'id' => 'createRequestForm']) !!}
                               		@include('pages.public.requests.form', ['submitButtonText' => 'Guardar'])
                                <div class="form-buttons form-group clearfix">
                                    <div class="row">
                                        <button type="submit" class="btn btn-success button-striped button-full-striped btn-ripple">Enviar Peticion<span class="ripple _11 animate" style="height: 102px; width: 102px; top: -21.1389px; left: 14.6215px;"></span><span class="ripple _12 animate" style="height: 102px; width: 102px; top: -21.1389px; left: 14.6215px;"></span></button>
                                    </div>
                                </div>
                                {!! Form::close() !!} 
                            </div><!--.panel-body-->
                        </div><!--.panel-->
                    </div><!--.col-md-12-->
                </div><!--.row-->
@stop