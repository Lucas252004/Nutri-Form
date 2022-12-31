<?php
require_once("db.php");
session_start();
if(!isset($_SESSION['idusers']) && !isset($_SESSION['name'])){
    header("Location: iniciar_sesion.php");
    exit();
}
if(time() - $_SESSION['time'] > 10800){
	session_destroy();
    header("Location: iniciar_sesion.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>NutriForm</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.7" />
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/image2.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
    <div class="contact1">
        <div class="contact1-pic js-tilt" data-tilt>
            <img src="images/image2.png" alt="IMG">
        </div>
		<div class="container-contact1">

			<form action="registro.php" method="POST" class="contact1-form validate-form" enctype="multipart/form-data">
			  <div class="separador">
				<span class="contact1-form-title">
					Ingrese su Producto
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" type="text" name="nombre" placeholder="Nombre" required>
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" type="text" name="porcion" placeholder="Porcion (gr o ml)" required>
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input class="input1" type="text" name="grasas" placeholder="Grasas (gr)">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" type="text" name="grasas_s" placeholder="Grasas Saturadas (gr)" required>
					<span class="shadow-input1"></span>
				</div>

                <div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input class="input1" type="text" name="proteinas" placeholder="Proteinas (gr)">
					<span class="shadow-input1"></span>
				</div>

                <div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input class="input1" type="text" name="sodio" placeholder="Sodio (mg)">
					<span class="shadow-input1"></span>
				</div>

                <div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input class="input1" type="text" name="azucar" placeholder="Azucares añadidos (gr)">
					<span class="shadow-input1"></span>
				</div>

                <div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input class="input1" type="text" name="carbohidratos" placeholder="Carbohidratos (gr)">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input class="input1" type="text" name="fibra" placeholder="Fibra Alimentaria (gr)">
					<span class="shadow-input1"></span>
				</div>


                <div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input class="input1" type="text" name="valor_energetico" placeholder="Valor Energetico/Calorias (Kcal)">
					<span class="shadow-input1"></span>
				</div>

                <div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input class="input1" type="number" name="codigo" placeholder="Codigo de Barras">
					<span class="shadow-input1"></span>
				</div>

                <div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<label for="">Bebida</label>
					<input class="check" type="checkbox" name="bebida" placeholder="Bebida" style="height: 25px; width: 25px; margin-left: 30px;">
					<span class="shadow-input1"></span>
				</div>

                <div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<label for="">Cafeina o Edulcorante</label>
					<input class="check" type="checkbox" name="cafe_edul" placeholder="Cafeina o Edulcorante" style="height: 25px; width: 25px; margin-left: 30px;">
					<span class="shadow-input1"></span>
				</div>

                <div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<label for="">Vegetariano</label>
					<input class="check" type="checkbox" name="vegetariano" placeholder="Vegetariano" style="height: 25px; width: 25px; margin-left: 30px;">
					<span class="shadow-input1"></span>
				</div>

                <div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<label for="">Celiaco</label>
					<input class="check" type="checkbox" name="celiaco" placeholder="Celiaco" style="height: 25px; width: 25px; margin-left: 30px;">
					<span class="shadow-input1"></span>
				</div>

                <div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<label for="">Vegano</label>
					<input class="check" type="checkbox" name="vegano" placeholder="Vegano" style="height: 25px; width: 25px; margin-left: 30px;">
					<span class="shadow-input1"></span>
				</div>

                <div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<label for="">Imagen Frente</label>
					<input  type="file" name="imagen">
					<!-- <span class="shadow-input1"></span> -->
				</div>
                <div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<label for="">Imagen Dorso</label>
					<input  type="file" name="imagen2">
					<!-- <span class="shadow-input1"></span> -->
				</div>
                <div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<label for="">Imagen Informacion nutricional</label>	
					<input  type="file" name="imagen3">
					<!-- <span class="shadow-input1"></span> -->
				</div>

				<div class="container-contact1-form-btn" >
					<input type="submit" name="enviar" class="btn btn-primary" style="cursor: pointer;"> 
                    <!-- <i class="fa fa-long-arrow-right" aria-hidden="true"></i> -->
				</div>
			  </div>
			</form>
        </div>
	</div>

	<div class="cerrar">
		<form action="logout.php" method="POST">
			<input type="submit" value="Cerrar Sesion" class="btn btn-danger" style="cursor: pointer;">
		</form>
	</div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
</body>
</html>