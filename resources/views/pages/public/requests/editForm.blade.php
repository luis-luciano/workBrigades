<div class="form-content">
    <div class="row">
        <input type="hidden" id="typeRequest" value="{{ $type }}">
        @if($type === 'edit')
            <div class="col-md-2">
                    <div class="form-group">
                        {!! Form::label('id', trans('requests.id'), ['class' => 'control-label']) !!}
                        <div class="inputer">
                            <div class="input-wrapper">
                                {!! Form::text('id', null, ['class' => 'form-control', 'disabled']) !!}
                            </div>
                        </div>
                    </div><!--.form-group-->
            </div>
        @endif
        <div class="col-md-3 border--dotted">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('citizen_id', trans('requests.citizen'), ['class' => 'control-label']) !!}
                        <div class="input-wrapper">
                            {!! Form::select('citizen_id', (isset($citizen))? $citizen :[], null, ['class' => 'citizen-search-box form-control', 'disabled','style' => 'width: 100%']) !!}
                        </div>
                    </div><!--.form-group-->
                </div>                
            </div>
        </div>
        

        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('typology_id', trans('requests.typology_id'), ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('typology_id', $typologies, null, ['class' => 'form-control','disabled','id'=>'typology']) !!}
                </div>
            </div><!--.form-group-->
        </div>

        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('problem_id', trans('requests.problem'), ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('problem_id',(isset($inquiry)? $inquiry->problems_list : []), null, ['class' => 'form-control','disabled','id'=>'problem']) !!}
                </div>
            </div><!--.form-group-->
        </div>

        <div class="col-md-1">
            <div class="form-group">
                {!! Form::label('request_priority_id', trans('requests.request_priority_id'), ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('request_priority_id', $priorities, null, ['class' => 'form-control','disabled']) !!}
                </div>
            </div><!--.form-group-->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::textarea('subject', null, ['class' => 'form-control', 'disabled','rows' => '2']) !!}
                        {!! Form::label('subject', trans('requests.subject'), ['class' => 'control-label','disabled']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('supervisions_name', trans('requests.supervisions'), ['class' => 'control-label']) !!}
                <div class="inputer">
                    <div class="input-wrapper">
                        {!! Form::textarea('supervisions_name', null, ['class' => 'form-control', 'rows'=>'2','disabled','id'=>'supervisions']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
    </div>

    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('colony_id', trans('requests.colony_id'), ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    <input type="hidden" id="colonySearchUri" value="{{ route('ajax.colonies.index') }}">
                    {!! Form::select('colony_id', $colonies, null, ['class' => 'form-control','disabled','style' => 'width: 100%']) !!}
                </div>
            </div><!--.form-group-->
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::textarea('street', null, ['class' => 'form-control', 'disabled','rows' => '2']) !!}
                        {!! Form::label('street', trans('requests.street'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>

        <div class="col-md-1">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('number', null, ['class' => 'form-control','disabled']) !!}
                        {!! Form::label('number', trans('requests.number'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::textarea('between_streets', null, ['class' => 'form-control', 'disabled','rows' => '2']) !!}
                        {!! Form::label('between_streets', trans('requests.between_streets'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>     
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('sector_id', trans('requests.sector'), ['class' => 'control-label']) !!}
                <div class="inputer">
                    <div class="input-wrapper">
                        {!! Form::textarea('sector_id', null, ['class' => 'form-control', 'rows'=>'1','disabled','id'=>'sector']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>

        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('brigade_id', trans('requests.brigade'), ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('brigade_id', (isset($inquiry)? $brigades : []), null, ['class' => 'form-control','disabled','style' => 'width: 100%']) !!}
                </div>
            </div><!--.form-group-->
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::textarea('reference', null, ['class' => 'form-control', 'rows' => '2']) !!}
                        {!! Form::label('reference', trans('requests.reference'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
    </div>
</div><!--.form-content-->

