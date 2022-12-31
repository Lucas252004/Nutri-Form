<?php
class Conexion{
    private $con; 
    //constructor
    public function __construct()
    {
        //me conecto a la base de datos bd_prueba
        $this->con = new mysqli('localhost', 'root', '', 'mydb2');
    }
    public function getCodigoBarras($codigo){
        //Guardo la consulta en una variable
        $query = $this->con->query("SELECT * FROM productos WHERE codigo_barra = '$codigo'");
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;
    }
    public function insertarCodigo($codigo){
        $sql = $this->con->query("INSERT INTO codigos_barras (codigo) VALUES ('$codigo')");
   
    }
    public function insertarProducto($nombre, $codigo, $vegetariano, $celiaco, $vegano){
        $sql = $this->con->query("INSERT INTO productos (nombre,codigo_barra,  aptoVegano, aptoCeliaco, aptoVegetariano) VALUES ('$nombre','$codigo','$vegano','$celiaco','$vegetariano')");
       
    }
    public function getCodigoProducto($codigo){
        //Guardo la consulta en una variable
        $query = $this->con->query("SELECT * FROM productos WHERE codigo_barra = '$codigo'");
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;
    }
    public function insertarNutrientes($proteinas, $grasas, $grasas_s,$sodio, $valor_energetico, $carbohidratos, $codigo_producto){
        $sql = $this->con->query("INSERT INTO nutrientes (proteinas, grasasTotales, grasasSaturadas,sodio, valorEnergetico, carbohidratos, productos_idproductos)values('$proteinas', '$grasas', '$grasas_s','$sodio',  '$valor_energetico', '$carbohidratos', '$codigo_producto')");
    }
    public function registrarUsuario($uname, $email, $pass){
        $sql = $this->con->query("INSERT INTO users (name, email, password) VALUES ('$uname', '$email', '$pass')");
        echo "Usuario registrado con Exito !";
    } 
    public function verificarUsuario($uname, $pass){
        //Guardo la consulta en una variable
        $query = $this->con->query("SELECT * FROM users WHERE name = '$uname' AND password = '$pass'");
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;
    }  
    public function agregarHistorial($idusers, $idproducto){
        $sql = $this->con->query("INSERT INTO historial (idhistorial, date, productos_idproductos, users_idusers) VALUES (NULL,now(),  '$idproducto', '$idusers')");
    } 
    public function verificarUsuarioExistente($uname, $email){
        //Guardo la consulta en una variable
        $query = $this->con->query("SELECT * FROM users WHERE name = '$uname' AND email = '$email'");
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;
    }
    public function insertarNutrientesCriticos($n_grasas, $n_grasas_s, $n_edul_cafe, $n_sodio, $n_azucar, $n_calorias, $idproducto){
        $sql = $this->con->query("INSERT INTO nutriente_critico (grasas,grasas_s,  edul_cafe, sodio, azucar, calorias, id_producto) VALUES ('$n_grasas','$n_grasas_s','$n_edul_cafe','$n_sodio', '$n_azucar','$n_calorias','$idproducto')");
    }
    }

?>