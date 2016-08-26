<div class="form-content">
 @include('errors.list')
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                        {!! Form::label('phone', 'Telefono', ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('extension', null, ['class' => 'form-control']) !!}
                        {!! Form::label('extension', 'Extencion', ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('supervision_id', trans('supervisions.supervision_id'), ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('supervision_id', $supervisions, null, ['class' => 'select2 form-control', 'style' => 'width: 100%']) !!}
                </div>
            </div><!--.form-group-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                {!! Form::label('user_id', 'Director', ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('user_id', $users, null, ['class' => 'select2 form-control', 'style' => 'width: 100%']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="form-group">
                {!! Form::label('members_list[]', trans('supervisions.members_list'), ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('members_list[]', $users, null, ['class' => 'select2 form-control', 'style' => 'width: 100%', 'multiple']) !!}
                </div>
            </div>
        </div>
    </div>
</div><!--.form-content-->

<div class="form-buttons form-group clearfix">
    <div class="row">
        <div class="col-md-12">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
            @unless(isset($onlySaveButton) && $onlySaveButton)
                <a href="{{ route('supervisions.create') }}" class="btn btn-primary">Nuevo</a>
                <a href="{{ route('supervisions.index') }}" class="btn btn-warning">Regresar</a>
            @endif
        </div>
    </div>
</div>



