<div class="sidebar">
		<span class="mif-chevron-left mif-3x boton"></span>
		<nav>
			<!------MENU LATERAL------->
			<ul id="menu_principal">
				<li class="logoM">
    			<img class="image-logo" src="/img/logom.jpg" alt="Logotipo">
    				<h4 style="color:white;">Hola </h4>
    			</li>

				<li><a href="{{url('index')}}">
					<span class="mif-home mif-3x principales"></span>
					inicio
				</a></li>

			<!------NAV BAR------->
			<!------CONSULTA------->
				<li>
					<label for="drop-Consulta">
						<span class="mif-search mif-3x principales"></span>
						Consulta
					</label>

				</li>
			<!------FIN CONSULTA------->
			<!------REPORTES------->
				<li>
					<label for="drop-1">
						<span class="mif-file-text mif-3x principales"></span>
						Reportes
						<span class="mif-chevron-right mif-2x derecha"></span>
						<span class="mif-expand-more mif-2x derecha"></span>
					</label>
					<input type="checkbox" id="drop-1">

					<ul>
						<li><a href="{{url('altareporte')}}">
                        <span class="mif-checkmark mif-2px smicon"></span>  
                        Alta</a></li>
						<li><a href="{{url('consultareporte')}}">
                        <span class="mif-search mif-2x principales"></span>
                        Consulta</a></li>
					</ul>
				</li>
			<!------FIN REPORTES------->
			<!------TRAMITES------->
				<li>
					<label for="drop-2">
						<span class="mif-balance-scale mif-3x principales"></span>
						Tramites
						<span class="mif-chevron-right mif-2x derecha"></span>
						<span class="mif-expand-more mif-2x derecha"></span>
					</label>
					<input type="checkbox" id="drop-2">

					<ul>
						<li><a href="{{url('altatramite')}}">
                        <span class="mif-checkmark mif-2px smicon"></span>  
                        Alta</a></li>
						<li><a href="#">
                        <span class="mif-search mif-2x principales"></span>
                        Consulta</a></li>
					</ul>

				</li>
			<!------FIN TRAMITES------->
			<!------PERSONAL------->	
				<li>
					<label for="drop-3">
						<span class="mif-user mif-3x principales"></span>
						Personal
						<span class="mif-chevron-right mif-2x derecha"></span>
						<span class="mif-expand-more mif-2x derecha"></span>
					</label>
					<input type="checkbox" id="drop-3">

					<ul>
						<li><a href="{{url('altausuario')}}">
                        <span class="mif-checkmark mif-2px smicon"></span>  
                        Alta</a></li>
						<li><a href="#">
                        <span class="mif-search mif-2x principales"></span>
                        Consulta</a></li>
					</ul>
				</li>
			<!------FIN PERSONAL------->
			<!----Cerrar Sesion-------->
				<li>
					<label for="drop-cerrarsesion">
						<a href="inc/logout.php">Cerrar Sesion</a> 
					</label>
				</li>
			<!--Termina Cerrar Sesion-->
			</ul>
		</nav>
			<!------MENU LATERAL------->
	</div>
