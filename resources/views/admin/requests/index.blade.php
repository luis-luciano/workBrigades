@extends('layouts.masterComplete')

@section('title', 'Peticiones')

@section('scripts')
    //requestsController.index();
    

@stop

@section('content')
    <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title"><h4>{{ plural('requests') }}</h4></div>
                    </div><!--.panel-heading-->

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ route('requests.create') }}">
                                    <button type="button" class="btn btn-success btn-ripple"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo</button>
                                    </a>

                                     <a target="_blank" href="{{ route('requests.print') }}"><button type="button" class="btn btn-light-blue btn-ripple" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button></a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-1">
                                <div class="form-group">
                                    {!! Form::select('limit', ['10' => '10', '15' => '15', '20' => '20', $requests->total() => 'Todos'], $requests->perPage(), ['class' => 'selecter', 'onchange' => 'this.form.submit()', 'data-width' => '100%']) !!}
                                </div>
                            </div>
                        {{--
                            <div class="col-md-8">  
                            </div>

                            <div class="col-md-3">
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="ion-android-calendar"></i></span>
                                                <div class="inputer">
                                                    <div class="input-wrapper">
                                                        {!! Form::text('date_range', Request::get('date_range', "01/01/2014 - " . dateToday('d/m/Y')), ['class' => 'form-control bootstrap-daterangepicker-specific']) !!}
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        --}}
                        </div>
                            
                         
                            <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="inputer">
                                                <div class="input-wrapper">
                                                    {!! Form::text('folio', Request::get('folio'), ['class' => 'form-control', 'placeholder' => 'Folio']) !!}
                                                </div>
                                            </div>
                                        </div><!--.form-group-->
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="inputer">
                                                <div class="input-wrapper">
                                                    {!! Form::text('citizen', Request::get('citizen'), ['class' => 'form-control', 'placeholder' => 'Nombre del Ciudadano']) !!}
                                                </div>
                                            </div>
                                        </div><!--.form-group-->
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                                {!! Form::multipleSelectPicker('request_states[]', $requestStates, Request::get('request_states'), ['title' => 'Estado']) !!}  
                                        </div><!--.form-group-->
                                    </div>

                                    <div class="col-md-3">
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ion-android-calendar"></i></span>
                                                        <div class="inputer">
                                                            <div class="input-wrapper">
                                                                {!! Form::text('date_range', Request::get('date_range', "01/01/2014 - " . dateToday('d/m/Y')), ['class' => 'form-control daterange-picker']) !!}
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-primary "><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                                        </div>
                               
                                        <div class="btn-group">   
                                            <a href="{{ route('requests.index') }}" class="btn btn-purple"><i class="fa fa-eye" aria-hidden="true"></i> Ver todos</a>
                                        </div>
                                    </div>
                                </div>          
                            </div>
                    
                        <br>
                        <!--Table Request--> 
                        <div class="row">
                            <div class="col-md-12">
                                @include('partials.requests.table', ['baseRequestRoute' => 'requests.edit', 'citizenName' => true, 'captureType' => true,'requests' => $requests])
                            </div>
                        </div>
                        <!--Table Request-->

                    </div><!--.panel-body-->
                </div><!--.panel-->
            </div><!--.col-md-12-->
        </div><!--.row-->
@stop