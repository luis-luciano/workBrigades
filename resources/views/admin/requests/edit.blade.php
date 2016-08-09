@extends('layouts.masterComplete')

@section('title', 'Petición - Editar')

@section('styles')
    
@stop

@section('scripts')
    requestsController.edit({!! $tipologiesRelations !!},"{{ route('request.sector-brigade') }}");
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Petición</h4>
                    </div>
                </div><!--.panel-heading-->
               <div class="panel-body">
                    {!! Form::model($inquiry,['route' => ['requests.update', $inquiry->id],'method' => 'PATCH', 'id' => 'editRequestForm']) !!}
                        @include('admin.requests.form', ['submitButtonText' => 'Actualizar', 'type' => 'edit'])
                    {!! Form::close() !!} 
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
{{--
    @include('partials.modals.layouts.closeModal', [
        'id' => 'createColonyModal',
        'title' => 'Agregar Colonia',
        'view' => 'admin.partials.modals.createColony'
    ])
--}}
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
@stop
