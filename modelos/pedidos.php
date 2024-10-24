<?php
    class Pedidos{
//Atributo
        public $conexion;
//Constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
//Metodos
        public function consulta(){
            $con = "SELECT pedidos.*, cliente.nombre AS cliente, usuario.nombre_usuario AS cajero 
                    FROM pedidos 
                    INNER JOIN usuario ON pedidos.fo_usuario= usuario.id_usuario
                    INNER JOIN cliente ON pedidos.fo_cliente= cliente.id_cliente
                    ORDER BY pedidos.id_pedidos";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }


        public function insertar($params){
            $ins = "INSERT INTO pedidos (fecha, fo_cliente, productos , subtotal , total, fo_usuario) 
                    VALUES ('$params->fecha',$params->fo_cliente,'$params->productos',$params->subtotal,$params->total,$params->fo_usuario)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El pedido se ha guardado";
            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM pedidos 
                    WHERE id_pedidos= $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El pedido ha sido eliminado";
            return $vec;

        }

        // public function remover($id){
        //     $del = "DELETE FROM pedidos 
        //             WHERE id_pedidos= $id";
        //     mysqli_query($this->conexion, $del);
        //     $vec = [];
        //     $vec['resultado'] = "OK";
        //     $vec['mensaje'] = "El pedido ha sido eliminado";
        //     return $vec;

        // }

        
        public function consulta_productos($id){
            $con = "SELECT pedidos.productos 
                    FROM pedidos
                    WHERE id_pedidos = $id";
            $res = mysqli_query($this->conexion, $con);
            $row = mysqli_fetch_array($res);
            $vec = unserialize($row[0]);

            return $vec;

        }



    
    }
?>