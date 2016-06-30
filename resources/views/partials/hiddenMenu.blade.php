<div class="layer-container">

		<!-- BEGIN MENU LAYER -->
		<div class="menu-layer">
			<ul>
				<li>
					<a href="{{ route('citizens.index') }}"><i class="fa fa-home"></i> Inicio</a>
				</li>			
				<li>
					<a href="{{ route('citizens.index') }}"><i class="fa fa-users"></i> Ciudadanos</a>
				</li>
				<li>
					<a href="{{ route('requests.index') }}"><i class="fa fa-file"></i> Peticiones</a>
				</li>
				<li>
					<a href="javascript:;"><i class="fa fa-cogs"></i> Sistema</a>
					<ul class="child-menu">
						<li>
							<a href="javascript:;"><i class="fa fa-map"></i> Colonias</a>
							<ul class="child-menu">
								<li><a href="{{ route('colonies.index') }}"><i class="fa fa-puzzle-piece"> </i> Gestionar</a></li>
								<li><a href="{{ route('colonies.scopes.index') }}"><i class="fa fa-crosshairs"></i> Ambito</a></li>
								<li><a href="{{ route('colonies.settlement-types.index') }}"><i class="fa fa-building"></i> Tipo de Asentamiento</a></li>
								<li><a href="{{ route('sectors.index') }}"><i class="fa fa-houzz"></i> Sectores</a></li>
							</ul>
						</li>
					</ul>
					<ul class="child-menu">
						<li>
							<a href="javascript:;"><i class="fa fa-file"></i>  Peticiones</a>
							<ul class="child-menu">
								<li><a href="{{ route('requestsStates.index') }}"><i class="fa fa-yelp"></i> Estados</a></li>
								<li><a href="{{ route('requestsPriorities.index') }}"><i class="fa fa-chain-broken"></i> Prioridades</a></li>
								<li><a href="{{ route('typologies.index') }}"><i class="fa fa-asterisk"></i> Tipologías</a></li>
								<li><a href="{{ route('captureTypes.index') }}"><i class="fa fa-pencil-square"></i> Tipo de captura</a></li>
								<li><a href="{{ route('problemTypes.index') }}"><i class="fa fa-clipboard"></i> Tipo de Problema</a></li>
								<li><a href="{{ route('brigades.index') }}"><i class="fa fa-users"></i> Brigadas</a></li>
							</ul>
						</li>
					</ul>
					<ul class="child-menu">
						<li>
						<a href="{{ route('supervisions.index') }}"><i class="fa fa-stumbleupon"></i> Superviciones</a>
						</li>
					</ul>
					<ul class="child-menu">
						<li>
						<a href="{{ route('roles.index') }}"><i class="fa fa-joomla"></i> Roles</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="{{ route('citizens.index') }}"><i class="fa fa-power-off"></i> Salir</a>
				</li>

			</ul>
		</div><!--.menu-layer-->
		<!-- END OF MENU LAYER -->

	</div><!--.layer-container-->
