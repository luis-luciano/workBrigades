@extends('pages.public.layouts.openMaster')

@section('title', 'Peticion Publica')

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Nueva Petición</h4>
                </div>
            </div><!--.panel-heading-->
            <div class="panel-body">
                {!! Form::open(['route' => 'Peticion-publica.store', 'id' => 'createRequestForm']) !!}
                    @include('pages.public.requests.form', ['submitButtonText' => 'Guardar'])
                {!! Form::close() !!} 
            </div><!--.panel-body-->
        </div><!--.panel-->
    </div><!--.col-md-12-->
</div><!--.row-->
@stop

