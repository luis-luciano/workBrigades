<div class="panel-heading">
    <ul class="nav nav-tabs with-panel nav-justified">
        <li><a href="#personal-information" data-toggle="tab" class="btn-ripple">Información Personal</a></li>
    </ul>
</div><!--.panel-heading-->
<div class="panel-body">
    <div class="tab-content with-panel">
        <div id="personal-information" class="tab-pane active">
            {{--@include('errors.htmlList', ['form' => 'CreateCitizenForm'])--}}
            {!! Form::open(['route' => 'ajax.citizens.store', 'id' => 'createCitizenForm']) !!}
                @include('admin.citizens.form', ['submitButtonText' => 'Guardar', 'onlySaveButton' => true])
            {!! Form::close() !!}
        </div><!--.tab-pane-->
    </div><!--.tab-content-->
</div><!--.panel-body-->
