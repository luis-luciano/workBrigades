@extends('pages.public.layouts.openMaster')

@section('title', 'Peticion Publica')

@section('styles')
    
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/globals/plugins/select2/css/select2.min.css') }}"> --}}
        
@stop

@section('scripts')
   {{--  <script type="text/javascript" src="{{ asset('assets/globals/plugins/select2/js/select2.full.min.js') }}"></script> --}}
   
@stop

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">
                    
                        <h4>Nueva Petición</h4>
                        <div class="row">
                            <div class="pull-right">
                                <small> Los Campos marcados con <i class="fa fa-asterisk" aria-hidden="true" style="color:blue;"></i> deben ser completados </small>
                            </div>
                        </div>
                    </div>
                    
                </div><!--.panel-heading-->

                <div class="panel-body">
                    {!! Form::open(['route' => 'Peticion-publica.store', 'id' => 'createRequestForm', 'files'=> true ]) !!}
                        @include('pages.public.requests.form', ['submitButtonText' => 'Guardar'])
                    {!! Form::close() !!} 

                </div><!--.panel-body-->
                

        </div><!--.panel-->
    </div><!--.col-md-12-->
</div><!--.row-->
@stop

