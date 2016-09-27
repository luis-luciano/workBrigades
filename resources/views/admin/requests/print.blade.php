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
                        <br>
                        <!--Table Request--> 
                        <div class="row">
                            <div class="col-md-12">
                                @include('partials.requests.tableReport', ['baseRequestRoute' => 'requests.edit', 'citizenName' => true, 'captureType' => true,'requests' => $requests])
                            </div>
                        </div>
                        <!--Table Request-->

                    </div><!--.panel-body-->
                </div><!--.panel-->
            </div><!--.col-md-12-->
        </div><!--.row-->
@stop