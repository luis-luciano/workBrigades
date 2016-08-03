<div class="form-content">
    <div class="row">
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

        <div class="col-md-{{ $type == 'edit' ? '4' : '6' }} border--dotted">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        {!! Form::label('citizen_id', trans('requests.citizen'), ['class' => 'control-label']) !!}
                        <div class="input-wrapper">
                            <input type="hidden" id="citizenSearchUri" value="{{ route('ajax.citizens.index') }}">
                            {!! Form::select('citizen_id', (isset($citizen))? $citizen :[], null, ['class' => 'citizen-search-box form-control select', 'style' => 'width: 100%']) !!}
                        </div>
                    </div><!--.form-group-->
                </div>
                <div class="col-md-3">
                    <br>
                    <div class="form-group text-center">
                            <span data-toggle="tooltip" data-placement="left" title="Editar Ciudadano"> 
                                <a id="editCitizenModalButton" data-toggle="modal" class="btn btn-floating btn-light-blue" data-target="#editCitizenModal" style="display: none"><i class="ion-edit"></i></a>
                            </span>
                            <span data-toggle="tooltip" data-placement="right" title="Agregar Ciudadano">
                                <a class="btn btn-floating btn-light-blue" data-toggle="modal" data-target="#searchCreateCitizenModal"><i class="ion-android-add" ></i></a>
                            </span>
                    </div><!--.form-group-->
                </div>
                
            </div>
        </div>
        

        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('typology_id', trans('requests.typology_id'), ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('typology_id', $typologies, null, ['class' => 'form-control select','id'=>'typology']) !!}
                </div>
            </div><!--.form-group-->
        </div>

        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('problem_id', trans('requests.problem'), ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('problem_id',(isset($inquiry)? $inquiry->problems_list : []), null, ['class' => 'form-control select','id'=>'problem']) !!}
                </div>
            </div><!--.form-group-->
        </div>

        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('request_priority_id', trans('requests.request_priority_id'), ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('request_priority_id', $priorities, null, ['class' => 'form-control select']) !!}
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
                    {!! Form::select('colony_id', $colonies, null, ['class' => 'form-control select', 'style' => 'width: 100%']) !!}
                </div>
            </div><!--.form-group-->
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::textarea('street', null, ['class' => 'form-control', 'rows' => '2']) !!}
                        {!! Form::label('street', trans('requests.street'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>

        <div class="col-md-1">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('number', null, ['class' => 'form-control']) !!}
                        {!! Form::label('number', trans('requests.number'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::textarea('between_streets', null, ['class' => 'form-control', 'rows' => '2']) !!}
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
                    {!! Form::select('brigade_id', [], null, ['class' => 'form-control', 'id'=>'brigade','style' => 'width: 100%']) !!}
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