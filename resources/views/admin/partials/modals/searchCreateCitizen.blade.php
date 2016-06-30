<div class="panel-heading">
    <ul class="nav nav-tabs with-panel nav-justified">
        <li class="active"><a href="#account" data-toggle="tab" class="btn-ripple">Buscar</a></li>
        <li><a href="#personal-information" data-toggle="tab" class="btn-ripple">Información Personal</a></li>
    </ul>
</div><!--.panel-heading-->
<div class="panel-body">
    <div class="tab-content with-panel">
        <div id="account" class="tab-pane active">
            <div class="form-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('citizen', 'Buscar ciudadano', ['class' => 'control-label']) !!}
                            <small> - Nombre completo (Fec. de nacimiento - email - profesión - colonia)</small>
                            <div class="input-wrapper">
                                <input type="hidden" id="citizenWithPersonalInformationSearchUri" value="">
                                {!! Form::select('citizen', [], null, ['class' => 'citizen-with-personal-information-search-box form-control', 'style' => 'width: 100%']) !!}
                            </div>
                        </div><!--.form-group-->
                    </div>
                </div>
                <div class="form-buttons form-group clearfix">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="setCitizenWithPersonalInformationButton" class="btn btn-success" disabled>Seleccionar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--.tab-pane-->
        <div id="personal-information" class="tab-pane">
            {{--@include('errors.htmlList', ['form' => 'CreateCitizenForm'])--}}
            {{--{!! Form::open(['route' => 'ajax.citizens.store', 'id' => 'createCitizenForm']) !!}--}}
                @include('admin.citizens.form', ['submitButtonText' => 'Guardar', 'onlySaveButton' => true])
           {{-- {!! Form::close() !!} --}}
        </div><!--.tab-pane-->
    </div><!--.tab-content-->
</div><!--.panel-body-->
