<div class="form-content">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        {!! Form::label('name','Nombre', ['class' => 'control-label']) !!}
                    </div>
                </div>
                
            </div><!--.form-group-->
        </div>
        <div class="col-md-7">
            <div class="form-group">
                {!! Form::label('supervisions_list[]', 'Supervición', ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('supervisions_list[]', $supervisions, null, ['class' => 'select2 form-control', 'style' => 'width: 100%', 'multiple']) !!}
                </div>
            </div><!--.form-group-->
    </div>
</div><!--.form-content-->

<div class="form-buttons form-group clearfix">
    <div class="row">
        <div class="col-md-12">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
            <a href="{{ route('typologies.create') }}" class="btn btn-primary">Nuevo</a>
            <a href="{{ route('typologies.index') }}" class="btn btn-warning">Regresar</a>
        </div>
    </div>
</div>
