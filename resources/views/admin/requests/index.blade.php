
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
                            <div class="col-md-12 col-md-offset-0">
                                <div class="form-group">
                                    <a href="{{ route('requests.create') }}">
                                    <button type="button" class="btn btn-success btn-ripple"><i class="fa fa-plus-circle"></i> Nuevo</button>
                                    </a>

                                     <a target="_blank" href="{{ route('requests.print') }}"><button type="button" class="btn btn-light-blue btn-ripple" target="_blank"><i class="fa fa-print"></i> Imprimir</button></a>
                                </div>
                            </div>
                        </div>
                        @if($requests->isEmpty())
                            <p>No se encontraron {{ plural('requests') }}. Vuelva a intentarlo <a class="btn btn-floating-sm btn-indigo" href="{{ route('requests.index') }}" ><i class="fa fa-refresh" aria-hidden="true"></i></a></p>
                        @else
                            {!! Form::open(['method' => 'GET' , 'id' => 'supervisionsSearchForm']) !!}
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            {!! Form::select('limit', ['10' => '10', '15' => '15', '20' => '20', $requests->total() => 'Todos'], $requests->perPage(), ['class' => 'selecter', 'onchange' => 'this.form.submit()', 'data-width' => '100%']) !!}
                                        </div>
                                    </div>
                                    @role("administrator|supervisor")
                                        <div class="col-md-8">  
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
                                    @endrole
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
                                            
                                            @role("administrator|supervisor")
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                            {!! Form::multipleSelectPicker('supervisions[]', $supervisions, Request::get('supervisions'), ['title' => plural('supervisions'),'data-width' => '100%']) !!} 
                                                    </div><!--.form-group-->
                                                </div>
                                            @endrole
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                        {!! Form::multipleSelectPicker('request_states[]', $requestStates, Request::get('request_states'), ['title' => 'Estado','data-width' => '100%']) !!}  
                                                </div><!--.form-group-->
                                            </div>

                                            @if(auth()->check() && !auth()->user()->hasRole("administrator|supervisor"))
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
                                            @endif
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-right">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary "><i class="fa fa-search"></i> Buscar</button>
                                        
                                                    <a href="{{ route('requests.index') }}" class="btn btn-purple"><i class="fa fa-eye"></i> Ver todos</a>
                                                </div>
                                            </div>
                                        </div>          
                                    </div>
                            {!! Form::close() !!}    
                                <br>
                            <!--Table Request--> 
                            <div class="row">
                                <div class="col-md-12">
                                    @include('partials.requests.table', ['baseRequestRoute' => 'requests.edit', 'citizenName' => true, 'captureType' => true,'requests' => $requests])
                                </div>
                            </div>
                            <!--Table Request-->
                        @endif
                    </div><!--.panel-body-->
                </div><!--.panel-->
            </div><!--.col-md-12-->
        </div><!--.row-->
@stop