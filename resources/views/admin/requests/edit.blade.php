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
                @if(!empty($inquiry->creator))
                        <small>Creado por : {{ $inquiry->creator->full_name }},  <time class="format-date-from-now"></time> <input hidden class="format-date-origin-from-now" value="{{ $inquiry->created_at }}"></small>
                @endif
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
                            <a href="{{ route('request.print',$inquiry->id) }}" class="btn btn-primary" target="_blank">Imprimir</a>
                        </div>

                        @can('creator',$inquiry)
                            <div class="pull-right"> 
                                {!! Form::open(['route' => ['requests.destroy', $inquiry->id], 'method' => 'DELETE', 'id' => 'deleteRequestForm']) !!}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger', 'id' => 'deleteRequestButton']) !!}
                                {!! Form::close() !!}     
                            </div>
                        @endcan
                    </div>
                    
                    {!! Form::model($inquiry,['route' => ['requests.update', $inquiry->id],'method' => 'PATCH', 'id' => 'editRequestForm']) !!}
                        @include('admin.requests.form', ['submitButtonText' => 'Actualizar', 'type' => 'edit'])
                    {!! Form::close() !!} 
                </div><!--.tab-pane-->

                <div class="tab-pane" id="geolocation">
                    @can('creator',$inquiry)
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
                    @endcan
                    
                    <div class="row">
                        @include('errors.list')
                        <div id="map"></div>
                    </div>
                    
                    {!! Form::model($inquiry->location, ['route' => ['requests.locations.update', $inquiry->id], 'method' => 'PUT']) !!}
                        {!! Form::text('latitude', null, ['id' => 'latitude', 'hidden']) !!}
                        {!! Form::text('longitude', null, ['id' => 'longitude', 'hidden']) !!}
                        @can('creator',$inquiry)
                            <div class="form-buttons form-group clearfix">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Form::submit($inquiry->has_location ? 'Actualizar' : 'Guardar', ['class' => 'btn btn-success']) !!}
                                    </div>
                                </div>
                            </div>
                        @endcan
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
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h3>{{ singular('requestReplies') }}
                                @if($inquiry->reply)
                                    <small>últ. vez actualizada el <span class="full-format-date">{{ $inquiry->reply->updated_at }}</span> por {{ $inquiry->reply->last_editor_full_name }}</small>
                                @endif
                            </h3>
                            {!! Form::model($inquiry->reply, ['route' => ['requests.replies.update', $inquiry->id], 'method' => 'PUT' ,'id' => 'editReplyForm']) !!}
                                <div class="form-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('reply_type_id', trans('requestReplies.reply_type_id'), ['class' => 'control-label']) !!}
                                                <div class="input-wrapper">
                                                    {!! Form::select('reply_type_id', $replyTypes, null, ['class' => 'select2 form-control', 'style' => 'width: 100%']) !!}
                                                </div>
                                            </div><!--.form-group-->
                                        </div>
                                    </div>
                                </div><!--.form-content-->
                                <div class="form-buttons form-group clearfix">
                                    <div class="row">
                                        <div class="pull-right">
                                            {!! Form::submit( is_null($inquiry->reply) ? 'Guardar' : 'Actualizar', ['class' => 'btn btn-success']) !!}
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div><!--.col-->
                    </div><!--.row-->


                    <div class="row" style="padding-top: 2em;">
                        <div class="col-md-8 col-md-offset-2">
                            <h3>Comentarios</h3>
                            <div class="comments">
                                @forelse($inquiry->comments->sortBy('created_at') as $comment)
                                    <div class="comment">
                                        <div class="user-photo"><img src="{{ route('users.photos.show', $comment->user->id) }}" alt=""></div>
                                        <div class="comment-body">
                                            <ul class="inline-list dot-seperator">
                                                <li><a>{{ $comment->user->full_name }}</a></li>
                                                <li class="small format-date-from-now">{{ $comment->created_at }}</li>
                                            </ul>
                                            <p>
                                                {!! nl2br(e($comment->body)) !!}
                                            </p>
                                        </div><!--.comment-body-->
                                    </div><!--.comment-->
                                @empty
                                    <p>Aún no hay comentarios, agrega uno!</p>
                                @endforelse

                                <div class="comment comment-box">
                                    <div class="user-photo"><img src="{{ route('users.profiles.photos.show') }}" alt=""></div>
                                    <div class="comment-body">
                                        {!! Form::open(['route' => ['requests.comments.store', $inquiry->id], 'method' => 'POST', 'id' => 'createRequestCommentRequestForm']) !!}
                                            <div class="inputer">
                                                <div class="input-wrapper">
                                                    {!! Form::textarea('body', null, ['class' => 'form-control js-auto-size', 'rows' => '1', 'style' => 'max-height: 300px;', 'placeholder' => 'Agrega un comentario...']) !!}
                                                </div>
                                            </div>
                                            <div class="pull-right">
                                                <button class="btn btn-success" type="submit">Agregar</button>
                                            </div>
                                        {!! Form::close() !!}
                                    </div><!--.comment-body-->
                                </div><!--.comment-->
                            </div><!--.comments-->
                        </div><!--.col-->
                    </div><!--.row-->
                </div><!--.tab-pane-->
                
                <div class="tab-pane" id="more">
                        @if(!in_array($inquiry->state->name,["concluded","unapproved"]))
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
                                </div>
                            </div><!--.row.client-list-->
                        @endif
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