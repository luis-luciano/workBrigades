<div class="form-content">
 @include('errors.list')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        {!! Form::label('name','Nombre', ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('typology_id', 'Tipologia', ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                  {!! Form::select('typology_id', $typologies , null, ['class' => 'select2 form-control', 'style' => 'width:100%;']) !!}
                </div>
            </div><!--.form-group-->
        </div>
    </div>
</div><!--.form-content-->

<div class="form-buttons form-group clearfix">
    <div class="row">
        <div class="col-md-12">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
            <a href="{{ route('problemTypes.create') }}" class="btn btn-primary">Nuevo</a>
            <a href="{{ route('problemTypes.index') }}" class="btn btn-warning">Regresar</a>
        </div>
    </div>
</div>
