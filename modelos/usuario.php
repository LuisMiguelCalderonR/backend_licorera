<?php
    class Usuario{
//Atributo
        public $conexion;
//Constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
//Metodos
        public function consulta(){
            $con = "SELECT usuario.*, tipo_usuario.tipo_usuario AS usuario 
                    FROM usuario 
                    INNER JOIN tipo_usuario ON usuario.fo_tipo_usuario=tipo_usuario.id_tipo_usuario
                    ORDER BY usuario.id_usuario";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id): array{
            $del = "DELETE FROM usuario 
                    WHERE id_usuario= $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El usuario ha sido eliminado";
            return $vec;

        }

        public function insertar($params){
            $ins = "INSERT INTO usuario (nombre_usuario, numero_identificacion, correo, contacto, direccion, clave, fo_tipo_usuario) 
                    VALUES ('$params->nombre_usuario', '$params->numero_identificacion','$params->correo', '$params->contacto', '$params->direccion', '$params->clave', $params->fo_tipo_usuario)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El usuario se ha guardado";
            return $vec;
        }

        public function editar($id,$params){
            $edi = "UPDATE usuario 
                    SET nombre_usuario= '$params->nombre_usuario', numero_identificacion= '$params->numero_identificacion', correo= '$params->correo', contacto= '$params->contacto',direccion= '$params->direccion',clave= '$params->clave', fo_tipo_usuario= $params->fo_tipo_usuario   
                    WHERE usuario.id_usuario= $id";
            mysqli_query($this->conexion, $edi);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El usuario se ha editado";
            return $vec;

        }

        public function filtro($valor){
            $fil = "SELECT usuario.*, tipo_usuario.tipo_usuario AS usuario 
                    FROM usuario 
                    INNER JOIN tipo_usuario ON usuario.fo_tipo_usuario=tipo_usuario.id_tipo_usuario
                    WHERE usuario.nombre_usuario LIKE '%$valor%' 
                    OR usuario.numero_identificacion LIKE '%$valor%' 
                    OR usuario.correo LIKE '%$valor%' 
                    OR usuario.contacto LIKE '%$valor%' 
                    OR usuario.direccion LIKE '%$valor%' 
                    OR usuario.clave LIKE '%$valor%'
                    OR tipo_usuario.tipo_usuario LIKE '%$valor%'";
            $res = mysqli_query($this->conexion, $fil);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
            }

            return $vec;
        }

    }
?>