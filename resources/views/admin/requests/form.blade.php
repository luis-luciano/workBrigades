<div class="form-content">
    <div class="row">
        {{--<div class="col-md-{{ $type == 'edit' ? '5' : '7' }}">--}}
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        {!! Form::label('citizen_id', trans('requests.citizen'), ['class' => 'control-label']) !!}
                        <div class="input-wrapper">
                            <input type="hidden" id="citizenSearchUri" value="">
                            {!! Form::select('citizen_id', (isset($citizens) ? $citizens: []), null, ['class' => 'citizen-search-box form-control', 'style' => 'width: 100%']) !!}
                        </div>
                    </div><!--.form-group-->
                </div>
                
            </div>
        </div>
        
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('request_priority_id', trans('requests.request_priority_id'), ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('request_priority_id', $priorities, null, ['class' => 'form-control chosen-select','data-placeholder'=>'Selecciona prioridad']) !!}
                </div>
            </div><!--.form-group-->
        </div>

        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('typology_id', trans('requests.typology_id'), ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('typology_id', $typologies, null, ['class' => 'form-control chosen-select','id'=>'typology']) !!}
                </div>
            </div><!--.form-group-->
        </div>

        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('problem_type_id', trans('requests.problem_type'), ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('problem_type_id',$problemTypes , null, ['class' => 'form-control chosen-select','id'=>'problem_types']) !!}
                </div>
            </div><!--.form-group-->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::textarea('subject', null, ['class' => 'form-control', 'rows' => '3']) !!}
                        {!! Form::label('subject', trans('requests.subject'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('supervisions', trans('requests.supervisions'), ['class' => 'control-label']) !!}
                <div class="inputer">
                    <div class="input-wrapper">
                        {!! Form::textarea('supervisions', null, ['class' => 'form-control', 'rows'=>'2','disabled','id'=>'supervisions']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
    </div>

    <div class="row">

        <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::label('colony_id', trans('requests.colony_id'), ['class' => 'control-label']) !!}
                        <div class="input-wrapper">
                            {!! Form::select('colony_id', $colonies, null, ['class' => 'form-control chosen-select', 'style' => 'width: 100%']) !!}
                        </div>
                    </div><!--.form-group-->
        </div>
        
        <div class="col-md-5">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::textarea('street', null, ['class' => 'form-control', 'rows' => '2']) !!}
                        {!! Form::label('street', trans('requests.street'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('number', null, ['class' => 'form-control']) !!}
                        {!! Form::label('number', trans('requests.number'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>

        
    </div>

    <div class="row">
        
    </div><!--.form-content-->

<div class="form-buttons form-group clearfix">
    <div class="row">
        <div class="col-md-12">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
            <a href="{{ route('requests.create') }}" class="btn btn-primary">Nuevo</a>
            <a href="{{ route('requests.index') }}" class="btn btn-warning">Regresar</a>
        </div>
    </div>
</div>
