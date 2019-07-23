<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="author" content="Francisco Garcia Hernandez">
    <meta name="description " content="Registro de usuarios">
    <meta name="keywords" content="HTML, CSS, JS, PHP, MySql">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/styleLogin.css')}}" />
</head>
<body>

    <div class="login-box {{  $errors->has('email') ? 'has-error':'' }}">
        <img class="avatar" src="img/avatar.jpg" alt="logo ayuntamiento">
        <h1>Ingresar Usuario</h1>
        <form autocomplete="off" action="{{ url('/login') }}" method="POST">
            {{ csrf_field() }}
        <!-----USERNAME----->
        {!! $errors->first('correoInstitucional') !!}
           <label for="username">Usuario</label>
           <input name="correoInstitucional" type="email" placeholder="Ingrese Usuario">

        <!-----PASSWORD----->
        <label for="password">Contraseña</label>
           <input name="password" type="password" placeholder="Ingrese Contraseña">
           {!! $errors->first('password') !!}
        <input type="submit" value="Ingresar">

        </form>
    </div>


</body>
</html>
