<div class="form-content">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        {!! Form::label('name', trans('settlementTypes.name'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
    </div>
     @include('errors.list')
</div><!--.form-content-->

<div class="form-buttons form-group clearfix">
    <div class="row">
        <div class="col-md-12">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
            <a href="{{ route('colonies.settlement-types.create') }}" class="btn btn-primary">Nuevo</a>
            <a href="{{ route('colonies.settlement-types.index') }}" class="btn btn-warning">Regresar</a>
        </div>
    </div>
</div>
