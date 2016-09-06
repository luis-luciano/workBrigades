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
            

       }
       
    </style>
@stop

@section('scripts')       

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
                        <br><br><br><br>
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
                                    <td>1</td>
                                    <td>José Alberto Vengas Garcia</td>
                                    <td>Fuga</td>
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
                                    <td>El la colonia benito tenemos una fuga que lleva mas de 11 meses sin arreglar , ya hablamos a hidrosistema y no le han dado solucion que podemos hacer el desperdicio de agua es enorme</td>
                                    <td>Alcantarillado</td>
                                    
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
                                    
                                    <td>Av 12 Calle 17 Colonia Esperanza</td>
                                    
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
                                    <td>2711015063</td>
                                    <td>25 de mayo de 2018</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
