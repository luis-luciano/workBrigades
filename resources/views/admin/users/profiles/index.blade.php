@extends('layouts.masterComplete')

@section('title', 'Usuarios')

@section('styles')
    @parent
    
@stop

@section('content')
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel" style="background-color: rgba(255, 255, 255, 0.19);">
					<div class="panel-heading">
                    	<div class="panel-title"><h4>Perfil de usuario</h4></div>
                	</div><!--.panel-heading-->
                	<div class="panel-body">
                    	<div class="row">
                        	<div class="col-md-6">
                            	<div class="table-responsive">
	                                <table class="table table-profile">
	                                    <thead>
	                                        <tr>
	                                            <th><img class="img-logo zoom" src="{{ asset('assets/globals/img/resources/logo-profile.png') }}" alt="" ></th>
	                                            <th>
	                                                <h4 class="text-blue">Información general de la cuenta <br><small class="text-green">Hidrosistema de Córdoba</small></h4>
	                                            </th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                        <tr class="highlight">
	                                            <td class="text-grey"><b>Nombre:</b></td>
	                                            <td>{{ auth()->user()->fullname }}</td>
	                                        </tr>
	                                        <tr class="highlight">
	                                            <td class="text-grey"><b>Email:<b></td>
	                                            <td>{{ auth()->user()->email }}</td>
	                                        </tr>
	                                        <tr class="highlight">
	                                            <td class="text-grey"><b>Movil:<b></td>
	                                            <td>{{ auth()->user()->mobile_phone }}</td>
	                                        </tr>

	                                    </tbody>
	                                </table>
                            	</div>{{-- end table resposive --}}
	                        </div>

		                    <div class="col-md-6">
	                            <div class="row">
	                                <img class="img-responsive center-block" src="{{ route('users.profiles.photos.show') }}" title="{{ auth()->user()->photo->display_name }}" >
	                            </div>
	                            <div class="row text-center">
	                                <br>
	                                <a href="{{ route('users.profiles.photos.edit') }}" class="btn btn-success button-striped button-full-striped btn-ripple btn-personality">
	                                    Subir foto
	                                </a>
	                            </div>
	                        </div>
                		</div>{{-- row --}}
                	</div><!--.panel-body-->
				</div><!--.panel-->
			</div><!--.col-md-12-->
		</div><!--.row-->
@stop

