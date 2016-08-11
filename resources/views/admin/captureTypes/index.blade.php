@extends('layouts.masterComplete')

@section('title', 'Tipos de Captura')

@section('styles')
    @parent
@stop

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel">
	            <div class="panel-heading">
	                <div class="panel-title"><h4>Tipos de Captura</h4></div>
	            </div><!--.panel-heading-->
	            <div class="panel-body">
	                <a href="{{ route('captureTypes.create') }}">
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
	                
	                @section('captureTypesTableHeader')
	                <th class="col-md-6">Tipo de Captura</th>
	                <th class="col-md-6">Color</th>
	                @stop
	                @section('captureTypesTableBody')
	                @foreach ($captureTypes as $captureType)

	                <tr>
	                	<td><input type="hidden" id="_url" value="{{ action('CaptureTypesController@edit',$captureType)}}">{{ $captureType->name }}</a></td>


	                	<td >
	                		<button type="button" class="btn btn-default btn-lg" style="background-color:{{ $captureType->color }};"></button>
	                	</td>

	                </tr>

	                @endforeach
	                @stop
	                @include('components.searchableTables.component', [
	                	'elements' => 'captureTypes',
	                	'modelInstance' => new App\CaptureType,
	                	'routePrefix' => 'captureTypes.',
	                	])
	               
	            </div><!--.panel-body-->
	        </div><!--.panel-->
	    </div><!--.col-md-12-->
	</div><!--.row-->
		
@stop