<?php
    class Departamento{
//Atributo
        public $conexion;
//Constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
//Metodos
        public function consulta(){
            $con = "SELECT departamento.* 
                    FROM departamento 
                    ORDER BY departamento.id_dpto";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM departamento 
                    WHERE id_dpto= $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El departamento ha sido eliminado";
            return $vec;

        }

        public function insertar($params){
            $ins = "INSERT INTO departamento(nombre) 
                    VALUES ('$params->nombre')";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El departamento se ha guardado";
            return $vec;
        }

        public function editar($id,$params){
            $edi = "UPDATE departamento 
                    SET nombre= '$params->nombre' 
                    WHERE departamento.id_dpto= $id";
            mysqli_query($this->conexion, $edi);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El departamento se ha editado";
            return $vec;

        }

        public function filtro($valor){
            $fil = "SELECT departamento.* 
                    FROM departamento 
                    WHERE departamento.nombre LIKE '%$valor%'";
            $res = mysqli_query($this->conexion, $fil);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
            }

            return $vec;
        }

    }
?>