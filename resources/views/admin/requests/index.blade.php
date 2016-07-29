@extends('layouts.masterComplete')

@section('title', 'Peticiones')

@section('styles')
    
@stop 

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

                    <button type="button" class="btn btn-light-blue btn-ripple" onClick="window.print();">Imprimir</button>
                    <div class="row">
                        <form action="#" class="form-horizontal parsley-validate">
                            <div class="form-body">

                            </div><!--.fomr-body-->
                        </form>
                    </div><!--.row-->
                    <br>
                   
                    @include('partials.requests.table', ['baseRequestRoute' => 'requests.edit', 'citizenName' => true, 'captureType' => true,'requests' => $requests])
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
@stop