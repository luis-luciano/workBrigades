<div class="layer-container">

		<!-- BEGIN MENU LAYER -->
		<div class="menu-layer">
			<ul>
				<li>
					<a href="{{ route('home') }}"><i class="fa fa-home"></i> Inicio</a>
				</li>
				@if(auth()->check())
					@can('index.citizen')
						<li>
							<a href="{{ route('citizens.index') }}"><i class="fa fa-users"></i> Ciudadanos</a>
						</li>
					@endcan

					@can('index.requests')
						<li>
							<a href="{{ route('requests.index') }}"><i class="fa fa-file"></i> Peticiones</a>
						</li>
					@endcan

					<li>
						<a href="javascript:;"><i class="fa fa-cogs"></i> Sistema</a>
						@can('config.colonies')
							<ul class="child-menu">
								<li>
									<a href="javascript:;"><i class="fa fa-map"></i> Colonias</a>
									<ul class="child-menu">
										@can('index.colonies') 
											<li>
												<a href="{{ route('colonies.index') }}"><i class="fa fa-puzzle-piece"> </i> Gestionar</a>
											</li> 
										@endcan

										@can('index.colony_scopes') 
											<li>
												<a href="{{ route('colonies.scopes.index') }}"><i class="fa fa-crosshairs"></i> Ambito</a>
											</li> 
										@endcan

										@can('index.settlement_types') 
											<li>
												<a href="{{ route('colonies.settlement-types.index') }}"><i class="fa fa-building"></i> Tipo de Asentamiento</a>
											</li> 
										@endcan
										
										@can('index.sectors') 
											<li>
												<a href="{{ route('sectors.index') }}"><i class="fa fa-houzz"></i> Sectores</a>
											</li> 
										@endcan
									</ul>
								</li>
							</ul>
						@endcan

						@can('config.requests')
							<ul class="child-menu">
								<li>
									<a href="javascript:;"><i class="fa fa-file"></i>  Peticiones</a>
									<ul class="child-menu">
										 @can('index.request_states') 
										 	<li>
										 		<a href="{{ route('requestsStates.index') }}"><i class="fa fa-yelp"></i> Estados</a>
										 	</li> 
										 @endcan

										 @can('index.request_priorities') 
										 	<li>
										 		<a href="{{ route('requestsPriorities.index') }}"><i class="fa fa-chain-broken"></i> Prioridades</a>
										 	</li> 
										 @endcan

										 @can('index.typologies') 
										 	<li>
										 		<a href="{{ route('typologies.index') }}"><i class="fa fa-asterisk"></i> Tipologías</a>
										 	</li> 
										 @endcan
										 
										 @can('index.capture_types') 
										 	<li>
										 		<a href="{{ route('captureTypes.index') }}"><i class="fa fa-pencil-square"></i> Tipo de captura</a>
										 	</li> 
										 @endcan

										 @can('index.request_types') 
										 	<li>
										 		<a href="{{ route('requestTypes.index') }}"><i class="fa fa-pencil-square"></i> Tipo de Peticion</a>
										 	</li> 
										 @endcan

										 @can('index.problem_types') 
										 	<li>
										 		<a href="{{ route('problemTypes.index') }}"><i class="fa fa-clipboard"></i> Tipo de Problema</a>
										 	</li> 
										 @endcan

										 @can('index.brigades') 
										 	<li>
										 		<a href="{{ route('brigades.index') }}"><i class="fa fa-users"></i> Brigadas</a>
										 	</li> 
										 @endcan
									</ul>
								</li>
							</ul>
						@endcan

						@can('index.supervisions')
							<ul class="child-menu">
								<li><a href="{{ route('supervisions.index') }}"><i class="fa fa-stumbleupon"></i> Superviciones</a></li>
							</ul>
						@endcan

						@can('index.users')
							<ul class="child-menu">
								<li><a href="{{ route('users.index') }}"><i class="fa fa-stumbleupon"></i> Usuarios</a></li>
							</ul>
						@endcan
						
						@can('index.roles')
							<ul class="child-menu">
								<li><a href="{{ route('roles.index') }}"><i class="fa fa-joomla"></i> Roles</a></li>
							</ul>
						@endcan

						@can('index.permissions')
							<ul class="child-menu">
								<li><a href="{{ route('permissions.index') }}"><i class="fa fa-joomla"></i> Permisos</a><li>
							</ul>
						@endcan
					</li>
					<li>
						<a href="{{ url('logout') }}"><i class="fa fa-sign-out fa-lg"></i> Cerrar la sesión</a>
					</li>		
				@endif			
			</ul>
		</div><!--.menu-layer-->
		<!-- END OF MENU LAYER -->

	</div><!--.layer-container-->
