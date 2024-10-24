<?php
    class Login{
//Atributo
        public $conexion;
//Constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
//Metodos
        public function consulta($correo, $clave) {
            $con = "SELECT usuario.*,tipo_usuario.tipo_usuario AS rol 
                    FROM usuario 
                    INNER JOIN tipo_usuario ON usuario.fo_tipo_usuario = tipo_usuario.id_tipo_usuario
                    WHERE usuario.correo= '$correo' && usuario.clave= '$clave'";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            if($vec==[]){
                $vec[0] = array("validar"=>"no valida");
            }else{
                $vec[0]['validar']='valida';
            }

            return $vec;
        }


    }
?>