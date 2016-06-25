@extends('layouts.masterComplete')

@section('title', 'Editar Sector')

@section('styles')
    @parent
    
@stop

@section('scripts')

@stop

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h2>Sector</h2></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    

                    {!! Form::model($sector, [ 'route'=> ['sectors.update', $sector->id], 'method' => 'PATCH']) !!}

                        @include('admin.sectors.form', ['submitButtonText' => 'Actualizar'])

                    {!! Form::close() !!}
                    
                </div><!--.panel-body-->
                
                
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop
