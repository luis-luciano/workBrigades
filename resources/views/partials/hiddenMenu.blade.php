<div class="layer-container">

		<!-- BEGIN MENU LAYER -->
		<div class="menu-layer">
			<ul>
							
				<li data-open-after="true">
					<a href="{{ route('citizens.index') }}">Ciudadanos</a>
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
								<li><a href="">Estados</a></li>
								<li><a href="">Prioridades</a></li>
								<li><a href="">Tipologías</a></li>
								<li><a href="">Tipo de captura</a></li>
								<li><a href="">Tipo de petición</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="http://themeforest.net/item/pleasure-material-design-responsive-admin-panel/10579013">Buy Pleasure</a>
				</li>
			
				<li data-open-after="true">
					<a href=""><span class="glyphicon glyphicon-lock"></span>  Aun No Inicias Secion !!</a>
				</li>
			

			</ul>
		</div><!--.menu-layer-->
		<!-- END OF MENU LAYER -->

	</div><!--.layer-container-->
