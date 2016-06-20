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
							</ul>
						</li>
					</ul>
					<ul class="child-menu">
						<li>
							<a href="javascript:;">Peticiones</a>
							<ul class="child-menu">
								<li><a href="{{ route('requestsStates.index') }}">Estados</a></li>
								<li><a href="{{ route('requestsPriorities.index') }}">Prioridades</a></li>
								<li><a href="{{ route('typologies.index') }}">Tipologías</a></li>
								<li><a href="{{ route('captureTypes.index') }}">Tipo de captura</a></li>
								<li><a href="">Tipo de petición</a></li>
							</ul>
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
