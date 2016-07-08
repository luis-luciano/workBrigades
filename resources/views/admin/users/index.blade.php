@extends('layouts.masterComplete')

@section('title', 'Usuarios')

@section('styles')
    @parent
    
@stop

@include('partials.tableScripts')

@section('content')
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel">

					<div class="panel-heading">
						<div class="panel-title"><h4>Usuarios</h4></div>
					</div><!--.panel-heading-->
					<div class="panel-body">
					<a href="{{ route('users.create') }}">
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
								@section('usersTableHeader')
			                	<th class="col-md-6">Nombre</th>
			                	
			                	@stop
			                	@section('usersTableBody')
				                	@foreach ($users as $user)
									
				    					<tr>
											<td><input type="hidden" id="_url" value="{{ action('UsersController@edit',$user)}}">{{ $user->email }}</a></td>										
										</tr>
									
									@endforeach
				                @stop
				                @include('components.searchableTables.component', [
				                		'elements' => 'users',
				                		'modelInstance' => new App\User,
				                		'routePrefix' => 'users.',
				                		])
					

						
					</div><!--.panel-body-->
				</div><!--.panel-->
			</div><!--.col-md-12-->
		</div><!--.row-->
@stop