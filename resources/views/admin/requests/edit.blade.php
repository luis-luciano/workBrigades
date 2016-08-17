@extends('layouts.masterComplete')

@section('title', 'Petición - Editar')

@section('styles')
    
@stop

@section('scripts')
    requestsController.edit({!! $tipologiesRelations !!},"{{ route('request.sector-brigade') }}", {!! $images !!});
@stop

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="panel-title"> 
                {{ singular('requests') }} 
                <div class="status pull-right" data-color-status="{{ $inquiry->state->color }}">
                    {{ $inquiry->state->label }}
                </div>
            </div>
            
            <ul class="nav nav-tabs with-panel nav-justified" id="tabs">
                <li class="active"><a href="#request" data-toggle="tab"><i class="fa fa-pencil-square"></i> Petición</a></li>
                <li><a href="#geolocation" data-toggle="tab"><i class="fa fa-globe"></i> Geolocalización</a></li>
                <li><a href="#files" data-toggle="tab"><i class="fa fa-files-o"></i> Archivos</a></li>
                <li><a href="#reply" data-toggle="tab"><i class="fa fa-commenting-o"></i> Respuesta</a></li>
                <li><a href="#more" data-toggle="tab"><i class="fa fa-reorder"></i> Más</a></li>
            </ul><!--.panel-nav-tabs-->
        </div><!--.panel-heading-->
        
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane active" id="request">
                    <div class="form-buttons buttons-on-top clearfix">
                        <div class="pull-left">
                            <a href="" class="btn btn-primary" target="_blank">Imprimir</a>
                        </div>
                        <div class="pull-right">
                            {!! Form::open(['route' => ['requests.destroy', $inquiry->id], 'method' => 'DELETE', 'id' => 'deleteRequestForm']) !!}
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger', 'id' => 'deleteRequestButton']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>

                   {!! Form::model($inquiry,['route' => ['requests.update', $inquiry->id],'method' => 'PATCH', 'id' => 'editRequestForm']) !!}
                        @include('admin.requests.form', ['submitButtonText' => 'Actualizar', 'type' => 'edit'])
                    {!! Form::close() !!} 
                </div><!--.tab-pane-->

                <div class="tab-pane" id="geolocation">
                    <div class="form-buttons buttons-on-top clearfix">
                        <div class="pull-left">
                            <button class="btn btn-primary" id="buttonGetGeolocation">Obtener mi ubicación</button>
                        </div>

                        @if($inquiry->has_location)
                            <div class="pull-right">
                                {!! Form::open(['route' => ['requests.locations.destroy', $inquiry->id], 'method' => 'DELETE', 'id' => 'deleteRequestLocationRequestForm']) !!}
                                    <button class="btn btn-danger" id="deleteRequestLocationRequestButton" type="submit">
                                        <i class="fa fa-trash-o"></i> Reestablecer
                                    </button>
                                {!! Form::close() !!}
                            </div>
                        @endif
                    </div>
                    
                    <div class="row">
                        <div id="map"></div>
                    </div>

                   {!! Form::model($inquiry->location, ['route' => ['requests.locations.update', $inquiry->id], 'method' => 'PUT']) !!}
                        {!! Form::text('latitude', null, ['id' => 'latitude', 'hidden']) !!}
                        {!! Form::text('longitude', null, ['id' => 'longitude', 'hidden']) !!}
                        <div class="form-buttons form-group clearfix">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::submit($inquiry->has_location ? 'Actualizar' : 'Guardar', ['class' => 'btn btn-success']) !!}
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div><!--.tab-pane-->

                <div class="tab-pane" id="files">
                    @if($inquiry->has_files)
                        <div class="form-buttons buttons-on-top clearfix">
                            <div class="pull-left">
                                @if($images->count() > 0)
                                    <a id="imageGalleryButton" class="btn btn-indigo">
                                        <i class="fa fa-image"></i> Ver Galería
                                    </a>
                                @endif
                                <a class="btn btn-blue" data-toggle="modal" data-target="#requestFilesModal">
                                    <i class="fa fa-files-o"></i> Ver Archivos
                                </a>
                            </div>
                        </div>
                    @endif
                    {!! Form::open(['route' => ['requests.files.store', $inquiry->id], 'files' => true, 'method' => 'POST']) !!}
                        <div class="form-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::file('file', ['id' => 'fileinput', 'accept' => '.jpg, .jpeg, .png, .pdf', 'multiple']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div><!--.tab-pane-->

                <div class="tab-pane" id="reply">
                    333333333333333333333333333333333
                </div><!--.tab-pane-->
                
                <div class="tab-pane" id="more">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-circle bg-green text-white"><i class="fa fa-check fa-3x" aria-hidden="true"></i></div>
                            {!! Form::open(['route' => ['requests.conclude', $inquiry->id], 'method' => 'POST', 'id' => 'requestConcludeForm']) !!}
                                {!! Form::submit('Concluir Petición', [ 'id' => 'requestConcludeButton', 'class' => 'btn btn-flat btn-green btn-lg btn-block btn-ripple']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-4">
                            <div class="icon-circle bg-blue text-white"><i class="fa fa-clock-o fa-3x" aria-hidden="true"></i></div>
                            {!! Form::open(['route' => ['requests.in-process', $inquiry->id], 'method' => 'POST', 'id' => 'requestConcludeForm']) !!}
                                {!! Form::submit('Establecer en proceso', [ 'id' => 'requestInProcessButton', 'class' => 'btn btn-flat btn-blue btn-lg btn-block btn-ripple']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-4">
                            <div class="icon-circle bg-red text-white"><i class="fa fa-close fa-3x" aria-hidden="true"></i></div>
                            <button type="button" class="btn btn-flat btn-red btn-lg btn-block btn-ripple" data-toggle="modal" data-target="#requestUnapprovedModal">{{ is_null($inquiry->rejection) ? 'Rechazar Petición' : 'Actualizar rechazo' }}</button>
                            {{-- Form::open(['route' => ['requests.unapproved', $inquiry->id], 'method' => 'POST', 'id' => 'requestUnapprovedForm']) !!}
                                {!! Form::submit('No Aprobar Petición', [ 'id' => 'requestUnapprovedButton', 'class' => 'btn btn-flat btn-red btn-lg btn-block btn-ripple']) !!}
                            {!! Form::close() --}}
                        </div>
                    </div><!--.row.client-list-->
                </div><!--.tab-pane-->
            </div><!--.tab-content-->
        </div>

        <div class="panel-footer footer-transparent text-dark" style="display: none">
            <div class="form-buttons clearfix">
                <div class="pull-left">
                     <a href="{{ route('requests.create') }}" class="btn btn-primary">Nuevo</a>
                     <a href="{{ route('requests.index') }}" class="btn btn-warning">Regresar</a>
                </div>
            </div>      
        </div>
    </div><!--.panel-->

    @include('partials.modals.gallery')

    @include('partials.modals.layouts.closeModal', [
        'id' => 'searchCreateCitizenModal',
        'title' => 'Agregar Ciudadano',
        'view' => 'admin.partials.modals.searchCreateCitizen'
    ])

    @include('partials.modals.layouts.closeModal', [
        'id' => 'editCitizenModal',
        'title' => 'Editar Ciudadano',
        'view' => 'admin.partials.modals.editCitizen',
        'attributes' => [
            'data-uri-source-data' => route('ajax.citizens.index')
        ]
    ])

    @include('partials.modals.layouts.closeModal', [
        'id' => 'requestFilesModal',
        'title' => 'Archivos Adjuntos',
        'view' => 'admin.partials.modals.files',
        'files' => $inquiry->files
    ])
    
    @include('partials.modals.layouts.closeModal', [
        'id' => 'requestUnapprovedModal',
        'title' => 'Rechazar petición',
        'view' => 'admin.partials.modals.rejectionRequest',
    ])
    
@stop