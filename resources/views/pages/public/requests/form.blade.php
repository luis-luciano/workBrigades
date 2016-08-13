@include('errors.list')
<div class="form-content">
    
    <div class="col-md-6">
    <div class="row"> <h5>Datos Personales</h5></div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">  
                <div class="inputer floating-label">
                     <div class="input-wrapper">
                         {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        {!! Form::label('name', trans('personalInformations.name'), ['class' => 'control-label']) !!}
                    </div> 
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-4"> 
            <div class="form-group">
                <div class="inputer floating-label">
                     <div class="input-wrapper">
                        {!! Form::text('paternal_surname', null, ['class' => 'form-control']) !!}
                        {!! Form::label('paternal_surname', trans('personalInformations.paternal_surname'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('maternal_surname', null, ['class' => 'form-control']) !!}
                        {!! Form::label('maternal_surname', trans('personalInformations.maternal_surname'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
    </div>
    <div class="row">
         <div class="col-md-6">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        {!! Form::label('email', trans('citizens.email'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('house_phone', null, ['class' => 'form-control']) !!}
                        {!! Form::label('house_phone', trans('personalInformations.house_phone'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('mobile_phone', null, ['class' => 'form-control']) !!}
                        {!! Form::label('mobile_phone', trans('personalInformations.mobile_phone'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('citizen_colony_id', trans('personalInformations.colony_id'), ['class' => 'control-label']) !!}
                <div class="input-wrapper">
                    {!! Form::select('citizen_colony_id', $colonies, null, ['class'=>'select','colony_citizen','style' => 'width: 100%']) !!}
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::textarea('citizen_street', null, ['class' => 'form-control', 'rows' => '2']) !!}
                        {!! Form::label('citizen_street', trans('personalInformations.street'), ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('citizen_number', null, ['class' => 'form-control']) !!}
                        {!! Form::label('citizen_number', '# Ext.', ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('interior', null, ['class' => 'form-control']) !!}
                        {!! Form::label('interior','#Int.', ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
    </div>
    </div>

    <!--.form-problem-->
    <div class="col-md-1"></div>
    <div class="col-md-6">
    <div class="row"> <h5>Problema Encontrado</h5></div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    {!! Form::label('problem_id', trans('requests.problem'), ['class' => 'control-label']) !!}
                    <div class="input-wrapper">
                        {!! Form::select('problem_id',$problems, null, ['class' => 'form-control','id'=>'problem']) !!}
                    </div>
                </div><!--.form-group-->
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    {!! Form::label('colony_id', trans('requests.colony_id'), ['class' => 'control-label']) !!}
                    <div class="input-wrapper">
                        {!! Form::select('colony_id', $colonies, null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
                    </div>
                </div><!--.form-group-->
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="inputer floating-label">
                        <div class="input-wrapper">
                            {!! Form::textarea('subject', null, ['class' => 'form-control', 'rows' => '3']) !!}
                            {!! Form::label('subject', trans('requests.subject'), ['class' => 'control-label']) !!}
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
                            {!! Form::label('street', trans('requests.street'), ['class' => 'control-label']) !!}
                        </div>
                    </div>
                </div><!--.form-group-->
            </div>

            <div class="col-md-3">
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
            <div class="col-md-12">
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
    </div>
</div><!--.form-content-->
<div class="row"></div>