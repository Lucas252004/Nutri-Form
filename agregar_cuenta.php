<?php
require_once("db.php");
$conn = new Conexion();
$dominio_valido = "et36@gmail.com"; //14 caracteres
if(isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['email'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['uname']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $pass = md5($pass);
    if(empty($uname)){
        header("Location: crear_cuenta.php?error=Nombre de Usuario requerido");
        exit();
    }else if(empty($pass)){
        header("Location: crear_cuenta.php?error=Contraseña requerida");
        exit();
    }else if(empty($email)){
        header("Location: crear_cuenta.php?error=Correo electronico requerido");
        exit();
    }else{
        $dominio_correo = substr($email,-14);
        if($dominio_correo == $dominio_valido){
            $result = $conn->verificarUsuarioExistente($uname, $email);
            if(empty($result)){
                $conn->registrarUsuario($uname, $email, $pass);
                header("Location: iniciar_sesion.php");
            }else{
                header("Location: crear_cuenta.php?error=Las credenciales ya estan en uso");
            }
        }else{
            header("Location: crear_cuenta.php?error=El dominio del correo no es valido");
        }
    }
}else{
    header("Location: index.php");
    exit();
}
?>