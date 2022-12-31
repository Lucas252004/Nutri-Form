<?php
require("db.php");
session_start();
//--------------- FUNCIONES NUTRIENTE CRITICO ---------------

//--------------- FUNCIONES NUTRIENTE CRITICO AZUCARES ---------------
function nutrienteC_azucares($valor_energetico, $azucar){
    $porcentaje = ($valor_energetico * 20)/100;
    $calorias_valor = $azucar * 4;
    if ($porcentaje <=$calorias_valor) {
        return 1;
    }else{
        return 0;
    }
   }

//--------------- FUNCIONES NUTRIENTE CRITICO GRASAS TOTALES---------------
   function nutrienteC_grasas_Totales($valor_energetico, $grasas){
       $porcentaje = ($valor_energetico * 35)/100;
       $calorias_valor = $grasas * 9;
       if ($porcentaje <=$calorias_valor) {
        return 1;
       }else{
        return 0;
       }
      }

//--------------- FUNCIONES NUTRIENTE CRITICO GRASAS SATURADAS---------------
   function nutrienteC_grasas_Saturadas($valor_energetico, $grasas_s){
       $porcentaje = ($valor_energetico * 12)/100;
       $calorias_valor = $grasas_s * 9;
       if ($porcentaje <=$calorias_valor) {
        return 1; 
       }else{
        return 0;
       }
   }

//--------------- FUNCIONES NUTRIENTE CRITICO SODIO---------------
   function nutrienteC_sodio ($valor_energetico, $porcion, $bebida, $sodio){
       //bebida 40 mg de sodio / 100 ml
       if ($bebida == 1){
           $verificacion = $sodio / $porcion;
           if ($verificacion >= 0.4){
               return 1;
           }else{
            return 0;
           }
        }else{
            //5 mg de sodio cada 1 cal
            //600 mg de sodio / 100 gr del peso
            $verificacion = $sodio/$valor_energetico;
            if ($verificacion >= 5){
                return 1;
            }else{
                return 0;
            }
        }
   }

//--------------- FUNCIONES NUTRIENTE CRITICO EDULCORANTE Y CAFE---------------
   function nutrienteC_edul_cafe ($cafe_edul){
       if ($cafe_edul == 1){
        return 1;
       }else{
        return 0;
       }
   }

//--------------- FUNCIONES NUTRIENTE CRITICO CALORIAS---------------
   function nutrienteC_calorias ($valor_energetico, $porcion, $bebida){
       if ($bebida == 1){
           //la porcion es en mililitros
           //50 cal/100ml == 0.5 cal/ml
           $verificacion = $valor_energetico / $porcion;
           if ($verificacion >= 0.5){
            return 1;
           }else{
            return 0;
           }
       }
       else{
           //la porcion es en gramos
           //300 cal/100g == 3 cal/g
           $verificacion = $valor_energetico / $porcion;
           if ($verificacion >= 3){
            return 1;
           }else{
            return 0;
           }
       }
   }

//--------------- LLAMADA A FUNCIONES DE NUTRIENTE CRITICO (SIN UTILIZAR POR EL MOMENTO)---------------
//     function nutrienteCritico($valor_energetico, $porcion, $bebida, $cafe_edul, $sodio, $grasas, $grasas_s, $azucar, $n_grasas, $n_grasas_s, $n_edul_cafe, $n_sodio, $n_azucar, $n_calorias ){
//         $n_azucar = nutrienteC_azucares($valor_energetico, $azucar, $nutriente_critico);
//         $n_grasas = nutrienteC_grasas_Totales($valor_energetico, $grasas, $nutriente_critico);
//         $n_grasas_s = nutrienteC_grasas_Saturadas($valor_energetico, $grasas_s, $nutriente_critico);
//         $n_sodio = nutrienteC_sodio ($valor_energetico, $nutriente_critico, $porcion, $bebida, $sodio);
//         $n_calorias = nutrienteC_calorias ($valor_energetico, $porcion, $bebida);
//         $n_edul_cafe = nutrienteC_edul_cafe($cafe_edul);
//         return $nutriente_critico;
//    }
//-------------------------------------------------------------------
//--------------- VARIABLES NUTRIENTES CRITICOS -----------------
$n_grasas = 0;
$n_grasas_s = 0;
$n_edul_cafe = 0;
$n_sodio = 0;
$n_azucar = 0;
$n_calorias = 0;
//--------------- PEDIDOS DE DATOS DEL FORMULARIO ---------------
$idusers = $_SESSION['idusers'];
$conectar= new Conexion();
$codigo_array = [];
$codigo_producto = [];
$vegetariano = 0;
$celiaco = 0;
$vegano = 0;
$cafe_edul = 0;
$idproducto = 0;
$bebida= 0;
$nutriente_critico = "";
if(isset($_POST['enviar'])){
    $codigo=$_POST['codigo'];
    $nombre = $_POST['nombre'];
    $porcion = $_POST['porcion'];
    $grasas=$_POST['grasas'];
    $grasas_s=$_POST['grasas_s'];
    $sodio=$_POST['sodio'];
    $azucar=$_POST['azucar'];
    $valor_energetico=$_POST['valor_energetico'];
    $proteinas=$_POST['proteinas'];
    $carbohidratos=$_POST['carbohidratos'];
    $fibra = $_POST['fibra'];
//------------------------------IMAGEN 1--------------------------------------------------------   
    //Guardar imagen 1
    $file = $_FILES['imagen'];
    $carpeta = "img_productos/";
    $ruta_provisional = $file['tmp_name'];
    $nombre_imagen = $file['name'];
    $src = $carpeta.$nombre_imagen;
    move_uploaded_file($ruta_provisional, $src);
    $imagen = 'img_productos/'.$nombre_imagen;
    

//----------------------------------IMAGEN 2----------------------------------------------------
    //Guardar imagen 2
    $file = $_FILES['imagen2'];
    $ruta_provisional = $file['tmp_name'];
    $nombre_imagen = $file['name'];
    $src = $carpeta.$nombre_imagen;
    move_uploaded_file($ruta_provisional, $src);
    $imagen2 = 'img_productos/'.$nombre_imagen;
//----------------------------IMAGEN 3---------------------------------------------------------
    //Guardar imagen 3
    $file = $_FILES['imagen3'];
    $ruta_provisional = $file['tmp_name'];
    $nombre_imagen = $file['name'];
    $src = $carpeta.$nombre_imagen;
    move_uploaded_file($ruta_provisional, $src);
    $imagen3 = 'img_productos/'.$nombre_imagen;
//--------------- CHECKBOXS ---------------
    if(isset($_POST['vegetariano'])){
        $vegetariano = 1;
    }
    if(isset($_POST['celiaco'])){
        $celiaco = 1;
    }
    if(isset($_POST['vegano'])){
        $vegano = 1;
    }
    if(isset($_POST['cafe_edul'])){
        $cafe_edul = 1;
    }
    if(isset($_POST['bebida'])){
        $bebida = 1;
    }

    //VERFICAR SI EL CODIGO DE BARRAS YA EXISTE
    $codigo_array = $conectar->getCodigoBarras($codigo);
    if(empty($codigo_array)){
        //Llamada a las funciones para calcular los nutrientes criticos
        $n_azucar = nutrienteC_azucares($valor_energetico, $azucar, $nutriente_critico);
        $n_grasas = nutrienteC_grasas_Totales($valor_energetico, $grasas, $nutriente_critico);
        $n_grasas_s = nutrienteC_grasas_Saturadas($valor_energetico, $grasas_s, $nutriente_critico);
        $n_sodio = nutrienteC_sodio ($valor_energetico, $nutriente_critico, $porcion, $bebida, $sodio);
        $n_calorias = nutrienteC_calorias ($valor_energetico, $porcion, $bebida);
        $n_edul_cafe = nutrienteC_edul_cafe($cafe_edul);
        //Insertar el producto a la base de datos
        $conectar->insertarProducto($nombre, $codigo, $vegetariano, $celiaco, $vegano);
        $codigo_producto = $conectar->getCodigoProducto($codigo);
    
        foreach($codigo_producto as $i){
            $id_producto = $i['idproductos'];
            
        }
        //Insertar los nutrientes, los nutrientes criticos y almacenar el historial de usuarios
        $conectar->insertarNutrientes($proteinas, $grasas, $grasas_s,$sodio, $valor_energetico, $carbohidratos, $id_producto);
        $conectar->insertarNutrientesCriticos($n_grasas, $n_grasas_s, $n_edul_cafe, $n_sodio, $n_azucar, $n_calorias, $id_producto);
        $conectar->agregarHistorial($idusers, $id_producto);
        header("Location:index2.php"); 
    }else{
        header("Location:index2.php"); 
    }
    // foreach($codigo_array as $i){
    //    $codigo = $i['idcodigos_barras'];
       
    // }
    //$nutriente_critico .= nutrienteCritico($valor_energetico, $porcion, $bebida, $cafe_edul, $sodio, $grasas, $grasas_s, $azucar, $nutriente_critico);
    

}


?>