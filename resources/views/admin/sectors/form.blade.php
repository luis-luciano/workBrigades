<div class="form-content">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('number', null, ['class' => 'form-control']) !!}
                        {!! Form::label('number', 'Sector', ['class' => 'control-label']) !!}
                        
                                               
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
            @unless(isset($onlySaveButton) && $onlySaveButton)
                <a href="{{ route('sectors.create') }}" class="btn btn-primary">Nuevo</a>
                <a href="{{ route('sectors.index') }}" class="btn btn-warning">Regresar</a>
            @endif
        </div>
    </div>
</div>



