<?php

 class conexion{

    private $usuario="root";
    private $password="";
    private $conexion;

    public function __construct(){
     try{
        $this->conexion= new PDO("mysql:host=localhost;dbname=db104", $this->usuario, $this->password);
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //echo "Conexión Realizada";
     }catch( PDOException $error ){

        return print_r("Fallo de conexion".$error);
        }   
    }

    # Con está función podemos hacer del CRUD: insertar, eliminar, actualizar
    public function ejecutar($sql){ 
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    # esta función tenemos el listar que nos hace falta del CRUD
    public function listar($sql){ 
        $sentencia=$this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();//retorna todos los registros en la base sql en un array Json.
    }
}

//$con = new conexion(); // instancié, para probar si se estaba bien la conexión



?>