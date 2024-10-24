<?php
    class Ventas{
//Atributo
        public $conexion;
//Constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
//Metodos
        public function consulta(){
            $con = "SELECT ventas.*, productos.nombre AS producto, productos.codigo AS codigo, productos.precio_und AS precio, cliente.nombre AS cliente, cliente.numero_contacto AS contacto, usuario.nombre_usuario AS cajero 
                    FROM ventas 
                    INNER JOIN productos ON ventas.fo_productos=productos.id_productos
                    INNER JOIN usuario ON ventas.fo_usuario= usuario.id_usuario
                    INNER JOIN cliente ON ventas.fo_cliente= cliente.id_cliente
                    ORDER BY ventas.id_ventas";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM ventas 
                    WHERE id_ventas= $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La venta ha sido eliminada";
            return $vec;

        }

        public function insertar($params){
            $ins = "INSERT INTO ventas (fecha, numero_factura, cantidad , total , fo_usuario, fo_cliente , fo_productos) 
                    VALUES ('$params->fecha','$params->numero_factura',$params->cantidad,$params->total,$params->fo_usuario,$params->fo_cliente,$params->fo_productos)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La venta se ha guardado";
            return $vec;
        }

        public function editar($id,$params){
            $edi = "UPDATE ventas 
                    SET fecha= '$params->fecha', numero_factura= '$params->numero_factura', cantidad= $params->cantidad, total= $params->total, fo_usuario= $params->fo_usuario, fo_cliente= $params->fo_cliente, fo_productos= $params->fo_productos
                    WHERE ventas.id_ventas= $id";
            mysqli_query($this->conexion, $edi);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La venta se ha editado";
            return $vec;

        }

        public function filtro($valor){
            $fil = "SELECT ventas.*, productos.nombre AS producto, productos.codigo AS codigo, productos.precio_und AS precio, cliente.nombre AS cliente, cliente.numero_contacto AS contacto, usuario.nombre_usuario AS cajero 
                    FROM ventas 
                    INNER JOIN productos ON ventas.fo_productos=productos.id_productos
                    INNER JOIN usuario ON ventas.fo_usuario= usuario.id_usuario
                    INNER JOIN cliente ON ventas.fo_cliente= cliente.id_cliente
                    WHERE ventas.fecha LIKE '%$valor%' 
                    OR ventas.numero_factura LIKE '%$valor%' 
                    OR ventas.cantidad LIKE '%$valor%' 
                    OR ventas.total LIKE '%$valor%' 
                    OR cliente.nombre LIKE '%$valor%'
                    OR productos.nombre LIKE '%$valor%' 
                    OR productos.codigo LIKE '%$valor%' 
                    OR productos.precio_und LIKE '%$valor%' 
                    OR usuario.nombre_usuario LIKE '%$valor%' 
                    OR cliente.numero_contacto LIKE '%$valor%' ";
            $res = mysqli_query($this->conexion, $fil);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
            }

            return $vec;
        }

    }
?>