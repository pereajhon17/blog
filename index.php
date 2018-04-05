 <?php
//Definimos la codificación de la cabecera.
header('Content-Type: text/html; charset=utf-8');
//Importamos el archivo con las validaciones.
require_once 'funciones/validaciones.php';
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado el formulario, sino se guardará null.
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
//Este array guardará los errores de validación que surjan.
$errores = array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Valida que el campo nombre no esté vacío.
    if (!validaRequerido($nombre) || (is_numeric($nombre))) {
        $errores[] = 'El campo nombre es incorrecto.';
    }
    if (!validaRequerido($apellidos) || (is_numeric($apellidos))) {
        $errores[] = 'El campo apellidos es incorrecto.';
    }
    //Valida la edad con un rango de 3 a 130 años.
    $opciones_telefono = array(
        'options' => array(
            //Definimos el rango de edad entre 3 a 130.
            'min_range' => 5,
            'max_range' => 9999999999
        )
    );
    if (!validarEntero($telefono, $opciones_telefono)) {
        $errores[] = 'El campo Telefono es incorrecto.';
    }
    //Valida que el campo email sea correcto.
    if (!validaEmail($email)) {
        $errores[] = 'El campo email es incorrecto.';
    }
    //Verifica si ha encontrado errores y de no haber redirige a la página con el mensaje de que pasó la validación.
    if(!$errores){
        session_start();
        $_SESSION['UserNames']=$_REQUEST['nombre'];
        $_SESSION['UserLastNames']=$_REQUEST['apellidos'];

        header('Location: formulario.php');
        exit();
        
    }
}
?>
<!DOCTYPE HTML>
<!--
	Horizons by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>MI PLANTILLA</title>
		<link rel="shortcutb icon" type="text/css" href="">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class="homepage">

		<!-- Header -->
			<div id="header">
				<div class="container">
						
					<!-- Logo -->
						<h1><a href="#" id="logo">JHON CARLOS PEREA MUÑOZ</a></h1>
					
					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="">INICIO</a>
									<ul>
									<li><a href="#">DATOS</a></li>
									</ul>
								<li>
									<a href="">PERFIL PERSONAL</a>
									<ul>
										<li><a href="perfil.html">¿QUIEN ES REALMENTE JHON CARLOS?</a></li>
											
								 	
												
						</nav>


					<!-- Banner -->
						<div id="banner">
							<div class="container">
								<section>
									<header class="major">
										<h2>BIENVENIDOS A MI PLANTILLA!</h2>
										
									</header>
									
								</section>			
							</div>
						</div>

				</div>
			</div>

		<!-- Featured -->
		<section id="content" >
								<header>
									<h2>Formulario</h2>
								</header>
       <form method="post" action="index.php" class="form-horizontal" role="form">
                <form method="post" action="formulario.php">
                    <div class="container" id="principal">
                        <div class="form-group">
                            <label>Nombres</label>
                                <input type="text" name="nombre" value="<?php echo $nombre ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Apellidos</label>
                                <input type="text" name="apellidos" value="<?php echo $apellidos ?>" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Telefono</label>
                                <input type="text" name="telefono" size="10" value="<?php echo $telefono ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>E-mail</label>
                                <input type="email" name="email" value="<?php echo $email ?>" id="email" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>Asunto</label>
                                <input type="text" name="Asunto" value="" required="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Mensaje</label>
                        </div>
                        <div class="form-group">
                            <textarea rows="6" cols="50" placeholder="Escriba un mensaje..." class="form-control"></textarea>
                        </div>
                            <div class="trans" id="boton">
                                <input type="submit" value="Enviar" class="btn btn-outline-dark">
                            </div>
                    </div>
                </form>
            </form>

							</section>
			<div class="wrapper style2">
				<section class="container">
					<header class="major">
						<h2>MOMENTOS VIVIDOS </h2>
						
					</header>
					<div class="row no-collapse-1">
						<section class="4u">
							<a href="#" class="image feature"><img src="images/MILA.jpg" alt=""></a>
							
						</section>
						<section class="4u">
							<a href="#" class="image feature"><img src="images/GRADO.jpg" alt=""></a>
							
						</section>
						<section class="4u">
							<a href="#" class="image feature"><img src="images/SANTOS.jpg" alt=""></a>
							
						</section>
	
					</div>
				</section>
			</div>

		<!-- Main -->
			<div id="main" class="wrapper style1">
				<section class="container">
					<header class="major">
						<h2>CONTACTENOS</h2>
						<span class="byline">PARA MAYOR INFOMACION</span>
					</header>
					<div class="row">
					
						<!-- Content -->
							<div class="6u">
								<section>
									<ul class="style">
										<li>
											<span class="fa fa-wrench"></span>
											<h3>REDES SOCIALES</h3>
											<a href="#">FACEBOOK</a>   ,
											<a href="#">INSTAGRAM</a>
											<br>
											<a href="#">TWITTER</a>    ,  
											 <a href="#">YOUTUBE</a>
										</li>
										<li>
											<span class="fa fa-cloud"></span>
											<h3>TELEFONOS</h3>
											<span>CELULAR = 3158880457
												<br>
												  TELEFONO FIJO = 631916.</span>
										</li>
									</ul>
								</section>
							</div>
							<div class="6u">
								<section>
									<ul class="style">
										<li>
											<span class="fa fa-cogs"></span>
											<h3>NUESTROS CORREOS ELECTRONICOS </h3>
											<span>JHONPEREA56@GMAIL.COM
												<br>
												  BERIIO_9@HOTMAIL.COM</span>
										</li>
										<li>
											<span class="fa fa-leaf"></span>
											<h3>DIRECCIONES</h3>
											<span>CALLE 7J # 68-24
												<br>
												 BARRIO LAS CEIBAS</span>
										</li>
									</ul>
								</section>
							</div>

					</div>
				</section>
			</div>

		<!-- Footer -->
			<div id="footer">
				<div class="container">

					<!-- Lists -->
						<div class="row">
							<div class="8u">
								<section>
									<header class="major">
										
							</div>
							<div class="4u">
								<section>
									<header class="major">
										<h2>MY PERSONAL INFORMATION</h2>
										
									</header>
									<ul class="contact">
										<li>
											<span class="address">Address</span>
											<span>PASAJE 7J#68-24 <br />LAS CEIBAS </span>
										</li>
										<li>
											<span class="mail">Mail</span>
											<span><a href="#">jhonperea56@gmail.com</a></span>
										</li>
										<li>
											<span class="phone">Phone</span>
											<span>(+57) 315-888-0457</span>
										</li>
									</ul>	
								</section>
							</div>
						</div>

					<!-- Copyright -->
						<div class="copyright">
							Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
						</div>

				</div>
			</div>

	</body>
</html>