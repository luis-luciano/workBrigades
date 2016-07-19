@extends('layouts.masterComplete')

@section('title', 'Colonias')

@section('styles')
    @parent
    
@stop


@include('partials.tableScripts')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title"><h4> Ciudadanos </h4></div>
            </div><!--.panel-heading-->
            <div class="panel-body">
                <a href="{{ route('citizens.create') }}">
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
                                @section('citizensTableHeader')
                                <th class="col-md-2">Nombre</th>
                                <th class="col-md-2">E-mail</th>
                                <th class="col-md-2">Tel. Celular</th>
                                <th class="col-md-2">Tel. Casa</th>
                                <th class="col-md-4">Colonia</th>
                                @stop
                                @section('citizensTableBody')
                                    @foreach ($citizens as $citizen)
                                        <tr>
                                            <td><input type="hidden" id="_url" value="{{ action('CitizensController@edit',$citizen->id)}}">{{ $citizen->fullName }}</a>
                                            </td> 
                                            <td>
                                                {{ $citizen->email }}
                                            </td>    
                                            <td>
                                                {{ $citizen->mobile_phone }}
                                            </td>
                                            
                                            <td>
                                                {{ $citizen->house_phone }}
                                            </td>  
                                            <td>
                                                {{ $citizen->colonyName }}
                                            </td>   
                                        </tr>
                                    @endforeach 
                                @stop
                                @include('components.searchableTables.component', [
                                        'elements' => 'citizens',
                                        'modelInstance' => new App\Citizen,
                                        'routePrefix' => 'citizens.',
                                        ])
                
            </div><!--.panel-body-->
        </div><!--.panel-->
    </div><!--.col-md-12-->
</div><!--.row-->
@stop
