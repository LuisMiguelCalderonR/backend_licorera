<?php
    class Cliente{
//Atributo
        public $conexion;
//Constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
//Metodos
        public function consulta(){
            $con = "SELECT cliente.*, ciudad.nombre AS ciudad, departamento.nombre AS departamento
                    FROM cliente 
                    INNER JOIN ciudad ON cliente.fo_ciudad=ciudad.id_ciudad
                    INNER JOIN departamento ON cliente.fo_dpto=departamento.id_dpto
                    ORDER BY cliente.id_cliente";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id): array{
            $del = "DELETE FROM cliente 
                    WHERE id_cliente= $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El cliente ha sido eliminado";
            return $vec;

        }

        public function insertar($params){
            $ins = "INSERT INTO cliente (nombre, tipo_identificacion, numero_identificacion, correo, direccion, numero_contacto, fo_ciudad, fo_dpto) 
                    VALUES ('$params->nombre', '$params->tipo_identificacion','$params->numero_identificacion', '$params->correo', '$params->direccion', '$params->numero_contacto', $params->fo_ciudad, $params->fo_dpto)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El cliente se ha guardado";
            return $vec;
        }

        public function editar($id,$params){
            $edi = "UPDATE cliente 
                    SET nombre= '$params->nombre', tipo_identificacion= '$params->tipo_identificacion', numero_identificacion= '$params->numero_identificacion', correo= '$params->correo', direccion= '$params->direccion',numero_contacto= '$params->numero_contacto',fo_ciudad= $params->fo_ciudad, fo_dpto= $params->fo_dpto   
                    WHERE cliente.id_cliente= $id";
            mysqli_query($this->conexion, $edi);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El cliente se ha editado";
            return $vec;

        }

        public function filtro($valor){
            $fil = "SELECT cliente.*, ciudad.nombre AS ciudad, departamento.nombre AS departamento
                    FROM cliente 
                    INNER JOIN ciudad ON cliente.fo_ciudad=ciudad.id_ciudad
                    INNER JOIN departamento ON cliente.fo_dpto=departamento.id_dpto
                    WHERE cliente.nombre LIKE '%$valor%' 
                    OR cliente.tipo_identificacion LIKE '%$valor%' 
                    OR cliente.numero_identificacion LIKE '%$valor%' 
                    OR cliente.correo LIKE '%$valor%' 
                    OR cliente.direccion LIKE '%$valor%' 
                    OR cliente.numero_contacto LIKE '%$valor%'
                    OR ciudad.nombre LIKE '%$valor%'
                    OR departamento.nombre LIKE '%$valor%'";
            $res = mysqli_query($this->conexion, $fil);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
            }

            return $vec;
        }

        public function consultar_cliente($valor){
            $fil = "SELECT cliente.*, ciudad.nombre AS ciudad, departamento.nombre AS departamento
                    FROM cliente 
                    INNER JOIN ciudad ON cliente.fo_ciudad=ciudad.id_ciudad
                    INNER JOIN departamento ON cliente.fo_dpto=departamento.id_dpto
                    WHERE cliente.numero_identificacion LIKE '$valor'";
            $res = mysqli_query($this->conexion, $fil);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
            }

            return $vec;
        }

        

    }
?>