<?php
    class Tipo_usuario{
//Atributo
        public $conexion;
//Constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
//Metodos
        public function consulta(){
            $con = "SELECT tipo_usuario.* 
                    FROM tipo_usuario 
                    ORDER BY tipo_usuario.id_tipo_usuario";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM tipo_usuario 
                    WHERE id_tipo_usuario= $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El tipo de usuario se ha sido eliminado";
            return $vec;

        }

        public function insertar($params){
            $ins = "INSERT INTO tipo_usuario(tipo_usuario) 
                    VALUES ('$params->tipo_usuario')";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El tipo de usuario se ha guardado";
            return $vec;
        }

        public function editar($id,$params){
            $edi = "UPDATE tipo_usuario 
                    SET tipo_usuario= '$params->tipo_usuario' 
                    WHERE tipo_usuario.id_tipo_usuario= $id";
            mysqli_query($this->conexion, $edi);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El tipo de usuario se ha editado";
            return $vec;

        }

        public function filtro($valor){
            $fil = "SELECT tipo_usuario.* 
                    FROM tipo_usuario 
                    WHERE tipo_usuario.tipo_usuario LIKE '%$valor%'";
            $res = mysqli_query($this->conexion, $fil);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
            }

            return $vec;
        }

    }
?>