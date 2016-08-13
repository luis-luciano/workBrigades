@extends('pages.public.layouts.openMaster')

@section('title', 'Peticion Publica')

@section('scripts')
    <script type="text/javascript">requestsController.create({!! $tipologiesRelations !!},"{{ route('request.sector-brigade') }}");</script>
@stop

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="panel-title"> Resumen de mi Peticion </div>

            <ul class="nav nav-tabs with-panel nav-justified" id="tabs">
                <li class="active"><a href="#status" data-toggle="tab"> Estado de la Peticion</a></li>
                <li><a href="#request" data-toggle="tab"> Detalle de la Peticion</a></li>
            </ul><!--.panel-nav-tabs-->
        </div><!--.panel-heading-->

        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane active" id="status">
                    
                    {{ $inquiry->StateLabel }}
                    <a class="btn btn-floating {{ $state }} btn-ripple"><i class="ion-android-star"></i><span class="ripple _22 animate" style="height: 100px; width: 100px; top: -9px; left: 48.5469px;"></span></a>   
                </div><!--.tab-pane-->

                <div class="tab-pane" id="request">
                     {!! Form::model($inquiry,['route' => ['requests.update', $inquiry->id],'method' => 'PATCH', 'id' => 'editRequestForm']) !!}
                     @include('pages.public.requests.Editform', ['submitButtonText' => 'Actualizar', 'type' => 'edit'])

                     {!! Form::close() !!} 
                </div><!--.tab-pane-->

            </div><!--.tab-content-->
        </div>
    <div class="row">
        <div class="col-md-10">
            <div style="display: inline-block">
                <a href="{{ route('Peticion-publica.create') }}" class="btn btn-primary">Nuevo</a>
                <a href="{{ route('Peticion-publica.index') }}" class="btn btn-warning">Regresar</a>
            </div>
        </div>
    </div>
    </div><!--.panel-->

    

@stop