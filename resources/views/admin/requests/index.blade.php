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

                                    <button type="button" class="btn btn-light-blue btn-ripple" onclick="window.print()"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-1">
                                <div class="form-group">
                                    {!! Form::select('limit', ['10' => '10', '15' => '15', '20' => '20', $requests->total() => 'Todos'], $requests->perPage(), ['class' => 'selecter', 'onchange' => 'this.form.submit()', 'data-width' => '100%']) !!}
                                </div>
                            </div>
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
                                    <div class="input-wrapper">
                                        {!! Form::text('citizen', Request::get('citizen'), ['class' => 'form-control', 'placeholder' => 'Nombre del Ciudadano']) !!}
                                     </div>
                                </div><!--.form-group-->
                            </div>
                        </div>

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