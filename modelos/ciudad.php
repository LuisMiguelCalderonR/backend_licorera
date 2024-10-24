<?php
    class Ciudad{
//Atributo
        public $conexion;
//Constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
//Metodos
        public function consulta(){
            $con = "SELECT ciudad.*, departamento.nombre AS departamento
                    FROM ciudad 
                    INNER JOIN departamento ON ciudad.fo_dpto=departamento.id_dpto
                    ORDER BY ciudad.id_ciudad";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM ciudad 
                    WHERE id_ciudad= $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La ciudad ha sido eliminada";
            return $vec;

        }

        public function insertar($params){
            $ins = "INSERT INTO ciudad(nombre, fo_dpto) 
                    VALUES ('$params->nombre',$params->fo_dpto)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La ciudad se ha guardado";
            return $vec;
        }

        public function editar($id,$params){
            $edi = "UPDATE ciudad 
                    SET nombre= '$params->nombre', fo_dpto= $params->fo_dpto 
                    WHERE ciudad.id_ciudad= $id";
            mysqli_query($this->conexion, $edi);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La ciudad se ha editado";
            return $vec;

        }

        public function filtro($valor){
            $fil = "SELECT ciudad.*, departamento.nombre AS dpto
                    FROM ciudad 
                    INNER JOIN departamento ON ciudad.fo_dpto=departamento.id_dpto
                    WHERE ciudad.nombre LIKE '%$valor%'
                    OR departamento.nombre LIKE '%$valor%';";
            $res = mysqli_query($this->conexion, $fil);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
            }

            return $vec;
        }

    }
?>