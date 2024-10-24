<?php
    class Reabastecimiento{
//Atributo
        public $conexion;
//Constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
//Metodos
        public function consulta(){
            $con = "SELECT reabastecimiento.*, productos.nombre AS producto, productos.codigo AS codigo, productos.precio_und AS precio, usuario.nombre_usuario AS bodeguero, proveedor.nombre AS proveedor 
                    FROM reabastecimiento 
                    INNER JOIN productos ON reabastecimiento.fo_producto=productos.id_productos
                    INNER JOIN usuario ON reabastecimiento.fo_usuario= usuario.id_usuario
                    INNER JOIN proveedor ON reabastecimiento.fo_proveedor= proveedor.id_proveedor
                    ORDER BY reabastecimiento.id_reabastecimiento";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM reabastecimiento 
                    WHERE id_reabastecimiento= $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La compra ha sido eliminada";
            return $vec;

        }

        public function insertar($params){
            $ins = "INSERT INTO reabastecimiento (fecha, orden_compra, cantidad_comprada , precio_total, fo_producto, fo_usuario, fo_proveedor) 
                    VALUES ('$params->fecha','$params->orden_compra', $params->cantidad_comprada, $params->precio_total, $params->fo_producto, $params->fo_usuario, $params->fo_proveedor)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La compra se ha guardado";
            return $vec;
        }

        public function editar($id,$params){
            $edi = "UPDATE reabastecimiento 
                    SET fecha= '$params->fecha', orden_compra= '$params->orden_compra', cantidad_comprada= $params->cantidad_comprada, precio_total= $params->precio_total, fo_producto= $params->fo_producto, fo_usuario= $params->fo_usuario, fo_proveedor= $params->fo_proveedor 
                    WHERE reabastecimiento.id_reabastecimiento= $id";
            mysqli_query($this->conexion, $edi);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La compra se ha editado";
            return $vec;

        }

        public function filtro($valor){
            $fil = "SELECT reabastecimiento.*, productos.nombre AS producto, productos.codigo AS codigo, productos.precio_und AS precio, usuario.nombre_usuario AS bodeguero, proveedor.nombre AS proveedor 
                    FROM reabastecimiento 
                    INNER JOIN productos ON reabastecimiento.fo_producto=productos.id_productos
                    INNER JOIN usuario ON reabastecimiento.fo_usuario= usuario.id_usuario
                    INNER JOIN proveedor ON reabastecimiento.fo_proveedor= proveedor.id_proveedor
                    WHERE reabastecimiento.fecha LIKE '%$valor%' 
                    OR reabastecimiento.orden_compra LIKE '%$valor%' 
                    OR reabastecimiento.cantidad_comprada LIKE '%$valor%' 
                    OR reabastecimiento.precio_total LIKE '%$valor%'
                    OR productos.nombre LIKE '%$valor%' 
                    OR productos.codigo LIKE '%$valor%' 
                    OR productos.precio_und LIKE '%$valor%' 
                    OR usuario.nombre_usuario LIKE '%$valor%' 
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