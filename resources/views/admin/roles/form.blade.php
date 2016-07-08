<div class="form-content">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('label', null, ['class' => 'form-control']) !!}
                        {!! Form::label('label', 'Etiqueta', ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('home', null, ['class' => 'form-control']) !!}
                        {!! Form::label('home', 'Home', ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('permissions_list[]', 'Permisos', ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('permissions_list[]', $permissions, null, ['class' => 'select2 form-control', 'style' => 'width: 100%', 'multiple']) !!}
                </div>
            </div><!--.form-group-->
        </div>
    </div>
</div><!--.form-content-->

<div class="form-buttons form-group clearfix">
    <div class="row">
        <div class="col-md-12">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
            @unless(isset($onlySaveButton) && $onlySaveButton)
                <a href="{{ route('roles.create') }}" class="btn btn-primary">Nuevo</a>
                <a href="{{ route('roles.index') }}" class="btn btn-warning">Regresar</a>
            @endif
        </div>
    </div>
</div>



