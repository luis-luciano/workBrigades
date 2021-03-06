@extends('layouts.masterComplete')

@section('title', 'Petición - Reporte')

@section('styles')

    <style type="text/css">
       
       @media print {
            @page {
                size: portrait;

            }
            
            .bg-danger {
              background-color: #f2dede !important;
            }

            .panel-body{
                margin-left:52px;
            }

            .map {
                max-width: none;
            }

       }
       
    </style>
@stop

@section('scripts')  

    $('.map').each(function(){
        initializeStaticMap($(this)[0], $(this).data('lat'), $(this).data('lng'));
    });     

@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Petición</h4>
                    </div>
                </div><!--.panel-heading-->
                <div class="panel-body"> 
                        <br><br>
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th># Folio</th>
                                    <th>Ciudadano</th>
                                    <th>Problema</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $inquiry->id }}</td>
                                    <td>{{ $inquiry->concerned->full_name }}</td>
                                    <td>{{ $inquiry->problem->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Asunto</th>
                                    <th>Supervición</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $inquiry->subject }}</td>
                                    <td>{{ $inquiry->supervisions_list }}</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Direccion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>  
                                    <td>
                                        {{ $inquiry->colony->settlementType->name }}: {{ $inquiry->colony->name." " }}
                                        {{ (!empty($inquiry->street)) ? "Dirección: " . $inquiry->street. " ": "" }}
                                        {{ (!empty($inquiry->number)) ? "Número: " . $inquiry->number." ": "" }}
                                        {{ (!empty($inquiry->between_streets)) ? "Entre: " . $inquiry->between_streets." ": "" }}
                                        {{ (!empty($inquiry->reference)) ? "Referencia: " . $inquiry->reference." ": "" }}
                                    </td>             
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Telefono</th>
                                    <th>Fecha de captura</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $inquiry->mobile_phone}}</td>
                                    <td>{{ $inquiry->date_created_short }}</td>   
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    @if($inquiry->has_location)
                        <div class="row">
                            <div class="col-md-12 headland"><strong>Localización</strong></div>
                            <div class="col-md-12 body">
                                <div class="map" id="map" data-lat="{{ $inquiry->location->latitude }}" data-lng="{{ $inquiry->location->longitude }}"></div>
                            </div>
                        </div>
                    @endif
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
