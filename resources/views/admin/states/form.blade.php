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
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('colour', null, ['class' => 'minicolors form-control','data-control'=>'wheel']) !!}
                        {!! Form::label('colour','Color', ['class' => 'control-label']) !!}
                        {{-- <input type="color" name="colour" value="{{ $state->colour }}" class="form-control"> --}}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
    </div>
</div><!--.form-content-->

<div class="form-buttons form-group clearfix">
    <div class="row">
        <div class="col-md-12">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
            <a href="{{ route('requestsStates.create') }}" class="btn btn-primary">Nuevo</a>
            <a href="{{ route('requestsStates.index') }}" class="btn btn-warning">Regresar</a>
        </div>
    </div>
</div>
