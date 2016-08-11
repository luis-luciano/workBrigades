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
            <div class="panel-title"> {{ singular('requests') }} </div>
            
            <ul class="nav nav-tabs with-panel nav-justified">
                <li class="active"><a href="#request" data-toggle="tab"><i class="fa fa-pencil-square"></i> Petición</a></li>
                <li><a href="#files" data-toggle="tab"><i class="fa fa-files-o"></i> Archivos</a></li>
                <li><a href="#reply" data-toggle="tab"><i class="fa fa-commenting-o"></i> Respuesta</a></li>
                <li><a href="#more" data-toggle="tab"><i class="fa fa-reorder"></i> Más</a></li>
            </ul><!--.panel-nav-tabs-->
        </div><!--.panel-heading-->
        
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane active" id="request">
                   {!! Form::model($inquiry,['route' => ['requests.update', $inquiry->id],'method' => 'PATCH', 'id' => 'editRequestForm']) !!}
                        @include('admin.requests.form', ['submitButtonText' => 'Actualizar', 'type' => 'edit'])
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
                    more
                </div><!--.tab-pane-->
            </div><!--.tab-content-->
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
@stop
