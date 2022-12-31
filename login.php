<?php
session_start();
require_once('db.php');
$conn = new Conexion();
if(isset($_POST['uname']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $pass = md5($pass);
    if(empty($uname)){
        header("Location: iniciar_sesion.php?error=Nombre de usuario y/o contraseña incorrecto");
        exit();
    }else if(empty($pass)){
        header("Location: iniciar_sesion.php?error=Nombre de usuario y/o contraseña incorrecto");
        exit();
    }else{
        $result = $conn->verificarUsuario($uname, $pass);
        if(empty($result)){
            header("Location: iniciar_sesion.php?error=Nombre de usuario y/o contraseña incorrecto");
            exit();
        }else{
            foreach($result as $row){
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['name'];
                $_SESSION['idusers'] = $row['idusers'];
                $_SESSION['time'] = time();
                header("Location: index2.php");
                exit();
            }
        }
    }
}else{
    header("Location: index.php");
    exit();
}
?>