<div class="form-content">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        {!! Form::label('name', trans('personalInformations.name'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('paternal_surname', null, ['class' => 'form-control']) !!}
                        {!! Form::label('paternal_surname', trans('personalInformations.paternal_surname'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('maternal_surname', null, ['class' => 'form-control']) !!}
                        {!! Form::label('maternal_surname', trans('personalInformations.maternal_surname'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('sex', trans('personalInformations.sex'), ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('sex', ["f" => 'Femenino', "m" => 'Masculino'], null, ['class' => 'select form-control', 'style' => 'width: 100%']) !!}
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('birthday', trans('personalInformations.birthday'), ['class' => 'control-label']) !!}
                <div class="inputer">
                    <div class="input-wrapper">
                        {!! Form::input('date', 'birthday', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('profession', null, ['class' => 'form-control']) !!}
                        {!! Form::label('profession', trans('personalInformations.profession'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('represent', null, ['class' => 'form-control']) !!}
                        {!! Form::label('represents', trans('personalInformations.represent'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        {!! Form::label('email', trans('citizens.email'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('house_phone', null, ['class' => 'form-control']) !!}
                        {!! Form::label('house_phone', trans('personalInformations.house_phone'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('mobile_phone', null, ['class' => 'form-control']) !!}
                        {!! Form::label('mobile_phone', trans('personalInformations.mobile_phone'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('fax', null, ['class' => 'form-control']) !!}
                        {!! Form::label('fax', trans('personalInformations.fax'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::textarea('street', null, ['class' => 'form-control', 'rows' => '2']) !!}
                        {!! Form::label('street', trans('personalInformations.street'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('number', null, ['class' => 'form-control']) !!}
                        {!! Form::label('number', trans('personalInformations.number'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('interior', null, ['class' => 'form-control']) !!}
                        {!! Form::label('interior', trans('personalInformations.interior'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('colony_id', trans('personalInformations.colony_id'), ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('colony_id', $colonies, null, ['class'=>'select','colony_citizen','style' => 'width: 100%']) !!}
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
                <a href="{{ route('citizens.create') }}" class="btn btn-primary">Nuevo</a>
                <a href="{{ route('citizens.index') }}" class="btn btn-warning">Regresar</a>
            @endif
        </div>
    </div>
</div>
