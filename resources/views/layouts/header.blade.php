<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Sistema Administrativo de Informacion</title>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{asset('css/metro/css/metro-icons.css')}}" />
	<link rel="stylesheet" href="{{asset('css/styleSAI.css')}}" />
	<link rel="stylesheet" href="{{asset('css/estiloReporte.css')}}" type="text/css"/>
	<link rel="stylesheet" href="{{asset('css/estiloTramite.css')}}" type="text/css"/>
	<link rel="stylesheet" href="{{asset('css/estiloUsuario.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/estiloConsulta.css')}}" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('jquery/jquery.datetimepicker.css')}}" />
	<script src="{{asset('jquery/jquery.js')}}"></script>
	<script src="{{asset('jquery/build/jquery.datetimepicker.full.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/consReportFetch.js')}}"></script>
</head>

<body>

	<header id="banner">
		<div>
			<h1 class="Btitulo" style="font-size:4vw;">Sistema Administrativo de Información</h1>
		</div>
    </header>

	<div class="sidebar">
		<span class="mif-chevron-left mif-3x boton"></span>
		<nav>
			<!------MENU LATERAL------->
			<ul id="menu_principal">
				<li class="logoM">
					<img class="image-logo" src="/img/logom.jpg" alt="Logotipo">
					<h4 style="color:white;">Hola {{Session::get('nombre')}} </h4>
				</li>

				<li><a href="{{url('index')}}">
						<span class="mif-home mif-3x principales"></span>
						inicio
					</a></li>

				<!------NAV BAR------->
				<!------CONSULTA------->
				<li> <a href="{{url('consultareporte')}}">
					<label for="drop-Consulta">
						<span class="mif-search mif-3x principales"></span>
						Consulta
					</label>
                    </a>
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
						<li><a href="{{url('consultadeReportes')}}">
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
						<li><a href="{{url('consultaTramite')}}">
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
						<li><a href="{{url('consultaPersonal')}}">
								<span class="mif-search mif-2x principales"></span>
								Consulta</a></li>
					</ul>
				</li>
				<!------FIN PERSONAL------->
				<!----Cerrar Sesion-------->
				<li>
					<label for="drop-cerrarsesion">
						<a href="{{url('logout')}}">Cerrar Sesion</a>
					</label>
				</li>
				<!--Termina Cerrar Sesion-->
			</ul>
		</nav>
		<!------MENU LATERAL------->
	</div>

	@yield('contenido')

	<!--------------contenido------------------->


	<footer class="wrap-Foot">

		<h2>
			H. Ayuntamiento de Tlacotalpan 2018-2021
		</h2>

    </footer>
    <script src="/vendor/sweetalert/sweetalert.all.js"></script>
@include('sweetalert::alert')
</body>

<script>
		jQuery(function() {
			$.datetimepicker.setLocale('es');
			jQuery('#date_timepicker_start').datetimepicker({
				format: 'Y-m-d',
				onShow: function(ct) {
					this.setOptions({
						maxDate: jQuery('#date_timepicker_end').val() ? jQuery('#date_timepicker_end').val() : false
					})
				},
				timepicker: false
			});
			jQuery('#date_timepicker_end').datetimepicker({
				format: 'Y-m-d',
				onShow: function(ct) {
					this.setOptions({
						minDate: jQuery('#date_timepicker_start').val() ? jQuery('#date_timepicker_start').val() : false
					})
				},
				timepicker: false
			});
		});
	</script>

</html>
