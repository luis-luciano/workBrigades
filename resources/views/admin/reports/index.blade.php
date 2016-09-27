
@extends('layouts.masterComplete')

@section('title', 'Reportes')

@section('scripts')
    var counters={!! $counters !!};
    var columns_typology = [];
    $.each(counters, function(index, counter) {
                columns_typology.push([ index , counter ]);
            });

    var counters_requests= {!! $counters_requests !!}
    
    var columns = [];
    $.each(counters_requests, function(index, counter) {
                columns.push([ index , counter ]);
            });

    var chart = c3.generate({
        bindto: '#chart-donut',
        data: {
          columns: columns_typology, 
          type: 'donut', 
        },
        donut: {
            title: "Reportes"
        }
    });

    var chart = c3.generate({
        bindto: '#chart-bar',
        data: {
          columns: columns_typology, 
          type: 'bar', 
        },
        donut: {
            title: "Reportes"
        }
    });

    var chart = c3.generate({
        bindto: '#proportional-supervicion',
        data: {
          columns: columns,
          type: 'donut', 
        },
        donut: {
            title: "Reportes"
        }
    });

    var chart = c3.generate({
        bindto: '#bars-supervicion',
        data: {
          columns: columns,
          type: 'bar', 
        },
        donut: {
            title: "Reportes"
        }
    });

    $('#searchButton').click(function(){
        $('#supervisionsSearchForm').attr('action',$('#routeSearchRequest').val());
        $('#supervisionsSearchForm').removeAttr('target');
        $('#supervisionsSearchForm').submit();
    });
    $('#printButton').click(function(){
        $('#supervisionsSearchForm').attr('action',$('#routePrintRequests').val());
        $('#supervisionsSearchForm').attr('target',"_blank");
        $('#supervisionsSearchForm').submit();
    });
@stop

@section('content')
    <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                @role("administrator|supervisor")
                    <div class="panel-heading">
                        <div class="panel-title"><h4>Graficas Generales</h4></div>
                    </div><!--.panel-heading-->
                    
                    <div class="panel-body">
                       <div class="row">
                            <div class="col-md-3">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title"><h4>Porcentaje Global por Typologia</h4></div>
                                    </div><!--.panel-heading-->
                                    <div class="panel-body">
                                        <div id="chart-donut"></div>
                                    </div><!--.panel-body-->
                                </div><!--.panel-->
                            </div><!--.col-md-3-->

                            <div class="col-md-4">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title"><h4>Total de Peticiones Global</h4></div>
                                    </div><!--.panel-heading-->
                                    <div class="panel-body">
                                        <div id="chart-bar"></div>
                                    </div><!--.panel-body-->
                                </div><!--.panel-->
                            </div><!--.col-md-4-->

                            <div class="col-md-5">
                                <div class="col-md-6">
                                    <div class="card card-dashboard-info card-blue-grey" style="background: {{ $states->where('name','in_process')->first()->color }}; ">
                                        <div class="card-body">
                                            <div class="card-icon"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div><!--.card-icon-->
                                            <p class="result">{{ $states->where('name','in_process')->first()->requests_count }}</p>
                                            <small><i class="fa fa-caret-up"></i> En Proceso</small>
                                        </div>
                                    </div>
                                </div> 
                                
                                <div class="col-md-6">
                                    <div class="card card-dashboard-info card-blue-grey" style="background: {{ $states->where('name','concluded')->first()->color }}">
                                        <div class="card-body">
                                            <div class="card-icon"><i class="fa fa-check-square fa-1x"></i></div><!--.card-icon-->
                                            <p class="result">{{ $states->where('name','concluded')->first()->requests_count }}</p>
                                            <small><i class="fa fa-caret-up"></i> Concluidas</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card card-dashboard-info card-blue-grey" style="background: {{ $states->where('name','expired')->first()->color }}">
                                        <div class="card-body">
                                            <div class="card-icon"><i class="fa  fa-battery-quarter"></i></div><!--.card-icon-->
                                            <p class="result">{{ $states->where('name','expired')->first()->requests_count }}</p>
                                            <small><i class="fa fa-caret-up"></i> Vencidas</small>
                                        </div>
                                    </div>
                                </div> 

                                <div class="col-md-6">
                                    <div class="card card-dashboard-info card-blue-grey" style="background: {{ $states->where('name','unapproved')->first()->color }}">
                                        <div class="card-body">
                                            <div class="card-icon"><i class="fa fa-ban"></i></div><!--.card-icon-->
                                            <p class="result">{{ $states->where('name','unapproved')->first()->requests_count }}</p>
                                            <small><i class="fa fa-caret-up"></i> No Aprobadas</small>
                                        </div>
                                    </div>
                                </div> 

                                <div class="col-md-12">
                                    <div class="card card-dashboard-info card-blue-grey" style="background: {{ $states->where('name','in_process_with_answer')->first()->color }}">
                                        <div class="card-body">
                                            <div class="card-icon"><i class="fa fa-commenting-o fa-spinner fa-pulse fa-2x" aria-hidden="true"></i>
                                            </div><!--.card-icon-->
                                            <p class="result">{{ $states->where('name','in_process_with_answer')->first()->requests_count }}</p>
                                            <small><i class="fa fa-caret-up"></i> Proceso Con Respuesta <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                            </small> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                @endrole

                    <div class="panel-heading">
                        <div class="panel-title"><h4>{{ isset($supervisions_found->name)? $supervisions_found->name : 'Personalizar Graficas' }}</h4></div>
                    </div><!--.panel-heading-->
                    <div class="panel-body">                        
                        {!! Form::open(['method' => 'GET' , 'id' => 'supervisionsSearchForm']) !!}
                                @include('admin.reports.form')  
                        {!! Form::close() !!}    

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title"><h4>Porcentaje Por Estados</h4></div>
                                        </div><!--.panel-heading-->
                                        <div class="panel-body">
                                            <div id="proportional-supervicion"></div>
                                        </div><!--.panel-body-->
                                    </div><!--.panel-->
                                </div><!--.col-md-3-->

                                <div class="col-md-8">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title"><h4>Peticiones por Estado</h4></div>
                                        </div><!--.panel-heading-->
                                        <div class="panel-body">
                                            <div id="bars-supervicion"></div>
                                        </div><!--.panel-body-->
                                    </div><!--.panel-->
                                </div><!--.col-md-4-->
                            </div>                       
                    </div><!--.panel-body-->
                </div><!--.panel-->
            </div><!--.col-md-12-->
        </div><!--.row-->
@stop