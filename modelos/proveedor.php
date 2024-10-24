<?php
    class Proveedor{
//Atributo
        public $conexion;
//Constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
//Metodos
        public function consulta(){
            $con = "SELECT proveedor.*, ciudad.nombre AS ciudad,departamento.nombre AS departamento 
                    FROM proveedor 
                    INNER JOIN ciudad ON proveedor.fo_ciudad=ciudad.id_ciudad
                    INNER JOIN departamento ON proveedor.fo_dpto=departamento.id_dpto
                    ORDER BY proveedor.id_proveedor";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM proveedor 
                    WHERE id_proveedor= $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El proveedor ha sido eliminado";
            return $vec;

        }

        public function insertar($params){
            $ins = "INSERT INTO proveedor (nombre, nit, contacto, direccion, fo_ciudad, fo_dpto) 
                    VALUES ('$params->nombre','$params->nit', '$params->contacto','$params->direccion',$params->fo_ciudad, $params->fo_dpto)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El Proveedor se ha guardado";
            return $vec;
        }

        public function editar($id,$params){
            $edi = "UPDATE proveedor 
                    SET nombre= '$params->nombre', nit= '$params->nit', contacto= '$params->contacto', direccion= '$params->direccion', fo_ciudad= $params->fo_ciudad, fo_dpto= $params->fo_dpto 
                    WHERE proveedor.id_proveedor= $id";
            mysqli_query($this->conexion, $edi);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El proveedor se ha editado";
            return $vec;

        }

        public function filtro($valor){
            $fil = "SELECT proveedor.*, ciudad.nombre AS ciudad, departamento.nombre AS departamento 
                    FROM proveedor 
                    INNER JOIN ciudad ON proveedor.fo_ciudad=ciudad.id_ciudad
                    INNER JOIN departamento ON proveedor.fo_dpto=departamento.id_dpto
                    WHERE proveedor.nombre LIKE '%$valor%' 
                    OR proveedor.nit LIKE '%$valor%' 
                    OR proveedor.contacto LIKE '%$valor%' 
                    OR proveedor.direccion LIKE '%$valor%' 
                    OR ciudad.nombre LIKE '%$valor%' 
                    OR departamento.nombre LIKE '%$valor%' ";
            $res = mysqli_query($this->conexion, $fil);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
            }

            return $vec;
        }

    }
?>