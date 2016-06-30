<div class="panel-body">
    @include('errors.htmlList', ['form' => 'EditCitizenForm'])
    {!! Form::open(['id' => 'editCitizenForm', 'method' => 'PATCH']) !!}
        @include('admin.citizens.form', ['submitButtonText' => 'Actualizar', 'onlySaveButton' => true])
    {!! Form::close() !!}
</div><!--.panel-body-->
