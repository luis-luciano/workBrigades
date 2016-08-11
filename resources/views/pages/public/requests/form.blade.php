 <div class="form-content">
                                    <div class="row">
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                {!! Form::label('typology_id', trans('requests.typology_id'), ['class' => 'control-label']) !!}
                                                <div class="input-wrapper">
                                                    {!! Form::select('typology_id', $typologies, null, ['class' => 'form-control','id'=>'typology']) !!}
                                                </div>
                                            </div><!--.form-group-->
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                {!! Form::label('problem_id', trans('requests.problem'), ['class' => 'control-label']) !!}
                                                <div class="input-wrapper">
                                                    {!! Form::select('problem_id',(isset($inquiry)? $inquiry->problems_list : []), null, ['class' => 'form-control','id'=>'problem']) !!}
                                                </div>
                                            </div><!--.form-group-->
                                        </div>

                                        <div class="col-md-1">
                                            <div class="form-group">
                                                {!! Form::label('request_priority_id', trans('requests.request_priority_id'), ['class' => 'control-label']) !!}
                                                <div class="input-wrapper">
                                                    {!! Form::select('request_priority_id', $priorities, null, ['class' => 'form-control']) !!}
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

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('colony_id', trans('requests.colony_id'), ['class' => 'control-label']) !!}
                                                <div class="input-wrapper">
                                                    {!! Form::select('colony_id', $colonies, null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
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
                                </div><!--.form-content-->