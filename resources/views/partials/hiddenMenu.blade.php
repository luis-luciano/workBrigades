<div class="layer-container">

		<!-- BEGIN MENU LAYER -->
		<div class="menu-layer">
			<ul>
				<li>
					<a href="{{ route('home') }}"><i class="fa fa-home"></i> Inicio</a>
				</li>
			@if (auth()->check())
				
				@if(auth()->user()->authorized(17))<li>
					<a href="{{ route('citizens.index') }}"><i class="fa fa-users"></i> Ciudadanos</a>
				</li>@endif
				@if(auth()->user()->authorized(71))<li>
					<a href="{{ route('requests.index') }}"><i class="fa fa-file"></i> Peticiones</a>
				</li>@endif
				<li>
					<a href="javascript:;"><i class="fa fa-cogs"></i> Sistema</a>
					<ul class="child-menu">
						<li>
							<a href="javascript:;"><i class="fa fa-map"></i> Colonias</a>
							<ul class="child-menu">
								@if(auth()->user()->authorized(22)) <li><a href="{{ route('colonies.index') }}"><i class="fa fa-puzzle-piece"> </i> Gestionar</a></li> @endif
								@if(auth()->user()->authorized(29)) <li><a href="{{ route('colonies.scopes.index') }}"><i class="fa fa-crosshairs"></i> Ambito</a></li> @endif
								@if(auth()->user()->authorized(92)) <li><a href="{{ route('colonies.settlement-types.index') }}"><i class="fa fa-building"></i> Tipo de Asentamiento</a></li> @endif
								@if(auth()->user()->authorized(85)) <li><a href="{{ route('sectors.index') }}"><i class="fa fa-houzz"></i> Sectores</a></li> @endif
							</ul>
						</li>
					</ul>
					<ul class="child-menu">
						<li>
							<a href="javascript:;"><i class="fa fa-file"></i>  Peticiones</a>
							<ul class="child-menu">
								 @if(auth()->user()->authorized(64)) <li><a href="{{ route('requestsStates.index') }}"><i class="fa fa-yelp"></i> Estados</a></li> @endif
								 @if(auth()->user()->authorized(50)) <li><a href="{{ route('requestsPriorities.index') }}"><i class="fa fa-chain-broken"></i> Prioridades</a></li> @endif
								 @if(auth()->user()->authorized(106)) <li><a href="{{ route('typologies.index') }}"><i class="fa fa-asterisk"></i> Tipologías</a></li> @endif
								 @if(auth()->user()->authorized(8)) <li><a href="{{ route('captureTypes.index') }}"><i class="fa fa-pencil-square"></i> Tipo de captura</a></li> @endif
								 @if(auth()->user()->authorized(120)) <li><a href="{{ route('requestTypes.index') }}"><i class="fa fa-pencil-square"></i> Tipo de Peticion</a></li> @endif
								 @if(auth()->user()->authorized(43)) <li><a href="{{ route('problemTypes.index') }}"><i class="fa fa-clipboard"></i> Tipo de Problema</a></li> @endif
								 @if(auth()->user()->authorized(1)) <li><a href="{{ route('brigades.index') }}"><i class="fa fa-users"></i> Brigadas</a></li> @endif
							</ul>
						</li>
					</ul>
					@if(auth()->user()->authorized(99))<ul class="child-menu">
						<li><a href="{{ route('supervisions.index') }}"><i class="fa fa-stumbleupon"></i> Superviciones</a></li></ul>
					@endif
					@if(auth()->user()->authorized(113))<ul class="child-menu">
						<li><a href="{{ route('users.index') }}"><i class="fa fa-stumbleupon"></i> Usuarios</a></li></ul>
					@endif
					
					@if(auth()->user()->authorized(78))<ul class="child-menu">
						<li><a href="{{ route('roles.index') }}"><i class="fa fa-joomla"></i> Roles</a></li></ul>
					@endif

					@if(auth()->user()->authorized(36))<ul class="child-menu">
						<li><a href="{{ route('permissions.index') }}"><i class="fa fa-joomla"></i> Permisos</a><li></ul>
					@endif
				</li>
				<li>
					
				</li>
			@else
					<li>
					
					</li>
			@endif			
				

			</ul>
		</div><!--.menu-layer-->
		<!-- END OF MENU LAYER -->

	</div><!--.layer-container-->
