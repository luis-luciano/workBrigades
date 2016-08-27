@extends('pages.public.layouts.openMaster')

@section('title', 'Peticion Publica')

@section('scripts')
    <script type="text/javascript">requestsController.create({!! $tipologiesRelations !!},"{{ route('request.sector-brigade') }}");</script>
@stop

@section('content')
<div class="col-md-9 col-md-offset-1">
    <div class="panel">
        <div class="panel-heading">
            <div class="panel-title"> Resumen de mi Peticion 
                <div class="row">
                    <div class="text-right">
                        <div class="btn btn-success button-striped button-full-striped btn-ripple">
                            Folio:  {{ $inquiry->id }} 
                        </div>
                        <div class="btn btn-info button-striped button-full-striped btn-ripple">
                            Pin:  {{ $inquiry->pin }}
                        </div> 
                    </div>
                </div>
            </div>
            

            <ul class="nav nav-tabs with-panel nav-justified" id="tabs">
                <li class="active"><a href="#status" data-toggle="tab"> Estado de la Peticion</a></li>
                <li><a href="#request" data-toggle="tab"> Detalle de la Peticion</a></li>
            </ul><!--.panel-nav-tabs-->
        </div><!--.panel-heading-->

        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane active" id="status">
                    
                    <div class="col-md-4 col-md-offset-4">
                        <div class="row">
                            <a class="btn btn-floating {{ $state }} btn-ripple" style="width: 150px; height: 150px; padding: 10px;border-radius: 50%; border: 0; font-size: 80px;">
                                <i class="ion-android-star"></i>
                                
                            </a>
                        </div>
                        
                        <div class="row" >
                            <h1>  {{ $inquiry->StateLabel }} </h1>
                        </div>
                    </div>  
                
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
    </div>
</div><!--.panel-->

    

@stop