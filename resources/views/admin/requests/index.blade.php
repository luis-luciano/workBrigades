@extends('layouts.masterComplete')

@section('title', 'Peticiones')

@section('scripts')
    //requestsController.index();
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>Peticiones</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    <a href="{{ route('requests.create') }}">
                        <button type="button" class="btn btn-success btn-ripple">Nuevo</button>
                    </a>

                    <button type="button" class="btn btn-light-blue btn-ripple">Imprimir</button>
                    <div class="row">
                        <form action="#" class="form-horizontal parsley-validate">
                            <div class="form-body">

                            </div><!--.fomr-body-->
                        </form>
                    </div><!--.row-->
                    <br>
                    @section('requestsTableHeader')
                                <th class="col-md-2">Estado</th>
                                <th class="col-md-2">Problema</th>
                                <th class="col-md-2">Prioridad</th>
                                <th class="col-md-2">Ciudadano</th>
                                <th class="col-md-4">Domicilio</th>
                    @stop

                    @section('requestsTableBody')
                        @foreach ($requests as $request)
                            <tr>
                                <td><input type="hidden" id="_url" value="{{ action('RequestsController@edit',$request->id)}}"></a> {{ $request->state->label }}
                                </td> 
                                <td>
                                    {{ $request->problem->name }}
                                </td>    
                                <td>
                                    {{ $request->priority->name }}
                                </td>
                                            
                                <td>
                                    {{ $request->concerned->full_name}}          
                                </td>  
                                <td>
                                    {{ $request->colony->name }}
                                </td>   
                            </tr>
                        @endforeach 
                    @stop
                    @include('components.searchableTables.component', [
                            'elements' => 'requests',
                            'modelInstance' => new App\Request,
                            'routePrefix' => 'requests.',
                            ])
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
