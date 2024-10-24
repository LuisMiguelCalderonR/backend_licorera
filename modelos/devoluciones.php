<?php
    class Devoluciones{
//Atributo
        public $conexion;
//Constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
//Metodos
        public function consulta(){
            $con = "SELECT devoluciones.*, productos.nombre AS nombre, productos.precio_und AS precio, proveedor.nombre AS proveedor 
                    FROM devoluciones 
                    INNER JOIN productos ON devoluciones.fo_productos=productos.id_productos
                    INNER JOIN proveedor ON devoluciones.fo_proveedor=proveedor.id_proveedor
                    ORDER BY devoluciones.id_devoluciones";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM devoluciones 
                    WHERE id_devoluciones= $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La devolucion ha sido eliminada";
            return $vec;

        }

        public function insertar($params){
            $ins = "INSERT INTO devoluciones (fecha_recoleccion, orden_devolucion, cantidad, fo_productos, fo_proveedor) 
                    VALUES ('$params->fecha_recoleccion','$params->orden_devolucion',$params->cantidad,$params->fo_productos,$params->fo_proveedor)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La devolucion se ha guardado";
            return $vec;
        }

        public function editar($id,$params){
            $edi = "UPDATE devoluciones 
                    SET fecha_recoleccion= '$params->fecha_recoleccion', orden_devolucion= '$params->orden_devolucion', cantidad= $params->cantidad, fo_productos= $params->fo_productos, fo_proveedor= $params->fo_proveedor 
                    WHERE devoluciones.id_devoluciones= $id";
            mysqli_query($this->conexion, $edi);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La devolucion se ha editado";
            return $vec;

        }

        public function filtro($valor){
            $fil = "SELECT devoluciones.*, productos.nombre AS nombre, productos.precio_und AS precio, proveedor.nombre AS proveedor 
                    FROM devoluciones 
                    INNER JOIN productos ON devoluciones.fo_productos=productos.id_productos
                    INNER JOIN proveedor ON devoluciones.fo_proveedor=proveedor.id_proveedor
                    WHERE devoluciones.fecha_recoleccion LIKE '%$valor%' 
                    OR devoluciones.orden_devolucion LIKE '%$valor%' 
                    OR devoluciones.cantidad LIKE '%$valor%' 
                    OR productos.nombre LIKE '%$valor%' 
                    OR productos.precio_und LIKE '%$valor%' 
                    OR proveedor.nombre LIKE '%$valor%' ";
            $res = mysqli_query($this->conexion, $fil);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
            }

            return $vec;
        }

    }
?>