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
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="css/estilos_form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<body>

    <section class="main">

        <figure class="main__figure">
            <img src="images/image2.png" class="main__img">
        </figure>

        <div class="main__contact">

            <h2 class="main__title">Nutri-Form</h2>
            <p class="main__paragraph">Ingrese su producto</p>

            <form class="main__form" action="registro.php" method="POST" class="contact1-form validate-form" enctype="multipart/form-data">

                <input type="text" placeholder="Nombre del Producto" class="main__input" name="nombre">
				<input type="text" placeholder="Porcion (gr/ml)" class="main__input" name="porcion">
				<input type="text" placeholder="Grasas (gr)" class="main__input2" name="grasas">
				<input type="text" placeholder="Grasas Saturadas (gr)" class="main__input2" name="grasas_s">
				<input type="text" placeholder="Proteinas (gr)" class="main__input2" name="proteinas">
				<input type="text" placeholder="Sodio (mg)" class="main__input2" name="sodio">
				<input type="text" placeholder="Azucares (gr)" class="main__input2" name="azucar">
				<input type="text" placeholder="Carbohidratos (gr)" class="main__input2" name="carbohidratos">
				<input type="text" placeholder="Fibras (gr)" class="main__input2" name="fibra">
				<input type="text" placeholder="Valor Energetico (Kcal)" class="main__input2" name="valor_energetico">
				<input type="text" placeholder="Codigo Barras" class="main__input" name="codigo">
				<!--CHECKBOXS-->

                <div class="check">
                
				<label for="">Bebida</label>
				<input type="checkbox" name="bebida" class="checkbox">
				<br><label for="">Cafeina o Edulcorante</label>
				<input type="checkbox" name="cafe_edul" class="checkbox">
				<br><br><label for="">Vegano</label>
				<input type="checkbox" name="vegano" class="checkbox">
				<br><label for="">Vegetariano</label>
				<input type="checkbox"  name="vegetariano"class="checkbox">
				<br><label for="">Celiaco</label>
				<input type="checkbox" name="celiaco" class="checkbox">
                </div>

				<!--IMAGENES-->
				<div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                    <input type="file" id="fichero-tarifas" name="imagen" class="input-file" value="">
                    Imagen de Frente
                </div><br>
				<div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                    <input type="file" id="fichero-tarifas" name="imagen2" class="input-file" value="">
                    Imagen informacion nutricional
                </div><br>
				<div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                    <input type="file" id="fichero-tarifas" name="imagen3" class="input-file" value="">
                    Imagen codigo de barras
                </div><br>
                <input type="submit" value="Cargar Producto" id='send' name="enviar" class="main__input main__input--send">

            </form>
			<form action="logout.php" method="post">
				<input type="submit" value="Cerrar Sesion" style="text-decoration: none;" class="main__input main__input--send" style="cursor: pointer;">
            	<!-- <a href="registro.html" style="text-decoration: none;" class="main__paragraph">Cerrar Sesion</a> -->
			</form>
            <!-- <article class="main__social">

                <a href="#" class="main__link">
                    <img src="./img/google-icon.svg" class="main__icon">
                </a>

                <a href="#" class="main__link">
                    <img src="./img/apple.svg" class="main__icon">
                </a>

                <a href="#" class="main__link">
                    <img src="./img/facebook.svg" class="main__icon">
                </a>

            </article> -->

        </div>

    </section>


	<script src="js/app.js"></script>
</body>

</html>