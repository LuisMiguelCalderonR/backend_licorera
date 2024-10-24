<?php
    class Productos{
//Atributo
        public $conexion;
//Constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
//Metodos
        public function consulta(){
            $con = "SELECT productos.*, categoria.nombre AS categoria 
                    FROM productos 
                    INNER JOIN categoria ON productos.fo_categoria=categoria.id_categoria 
                    ORDER BY productos.id_productos";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM productos 
                    WHERE id_productos= $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El producto ha sido eliminado";
            return $vec;

        }

        public function insertar($params){
            $ins = "INSERT INTO productos ( nombre, codigo, precio_und, precio_venta, cantidad_stock, fo_categoria ) 
                    VALUES ('$params->nombre','$params->codigo',$params->precio_und,$params->precio_venta,$params->cantidad_stock,$params->fo_categoria)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El producto se ha guardado";
            return $vec;
        }

        public function editar($id,$params){
            $edi = "UPDATE productos 
                    SET nombre= '$params->nombre', codigo= '$params->codigo', precio_und= $params->precio_und, precio_venta= $params->precio_venta, cantidad_stock= $params->cantidad_stock, fo_categoria= $params->fo_categoria 
                    WHERE productos.id_productos= $id";
            mysqli_query($this->conexion, $edi);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El producto se ha editado";
            return $vec;

        }

        public function filtro($valor){
            $fil = "SELECT productos.*, categoria.nombre AS nombre FROM productos 
                    INNER JOIN categoria ON productos.fo_categoria=categoria.id_categoria
                    WHERE productos.nombre LIKE '%$valor%' 
                    OR productos.codigo LIKE '%$valor%' 
                    OR productos.precio_und LIKE '%$valor%' 
                    OR productos.precio_venta LIKE '%$valor%' 
                    OR productos.cantidad_stock LIKE '%$valor%' 
                    OR categoria.nombre LIKE '%$valor%' ";
            $res = mysqli_query($this->conexion, $fil);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
            }

            return $vec;
        }

    }
?>