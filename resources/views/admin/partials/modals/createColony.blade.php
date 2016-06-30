<div class="panel-body">
    @include('errors.htmlList', ['form' => 'CreateColonyForm'])
    {!! Form::open(['route' => 'ajax.colonies.store', 'id' => 'createColonyForm']) !!}
        @include('admin.colonies.form', ['submitButtonText' => 'Guardar', 'onlySaveButton' => true])
    {!! Form::close() !!}
</div><!--.panel-body-->
