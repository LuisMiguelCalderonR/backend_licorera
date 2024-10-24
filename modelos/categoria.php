<?php
    class Categoria{
//Atributo
        public $conexion;
//Constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
//Metodos
        public function consulta(){
            $con = "SELECT categoria.* 
                    FROM categoria 
                    ORDER BY categoria.id_categoria";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM categoria 
                    WHERE id_categoria= $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La categoria ha sido eliminada";
            return $vec;

        }

        public function insertar($params){
            $ins = "INSERT INTO categoria(nombre) 
                    VALUES ('$params->nombre')";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La categoria se ha guardado";
            return $vec;
        }

        public function editar($id,$params){
            $edi = "UPDATE categoria 
                    SET nombre= '$params->nombre' 
                    WHERE categoria.id_categoria= $id";
            mysqli_query($this->conexion, $edi);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La categoria se ha editado";
            return $vec;

        }

        public function filtro($valor){
            $fil = "SELECT categoria.* 
                    FROM categoria 
                    WHERE categoria.nombre LIKE '%$valor%'";
            $res = mysqli_query($this->conexion, $fil);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
            }

            return $vec;
        }

    }
?>