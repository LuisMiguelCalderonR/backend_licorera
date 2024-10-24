<?php
    class Pago{
//Atributo
        public $conexion;
//Constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
//Metodos
        public function consulta(){
            $con = "SELECT pago.*,ventas.fecha AS fecha, ventas.numero_factura AS factura, ventas.total AS total, cliente.nombre AS cliente, cliente.numero_identificacion AS identificacion, cliente.numero_contacto AS contacto, cliente.correo AS correo, usuario.nombre_usuario AS vendedor 
                    FROM pago 
                    INNER JOIN ventas ON pago.fo_ventas=ventas.id_ventas
                    INNER JOIN cliente ON pago.fo_cliente= cliente.id_cliente
                    INNER JOIN usuario ON pago.fo_usuario= usuario.id_usuario
                    ORDER BY pago.id_pago";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM pago 
                    WHERE id_pago= $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El pago ha sido eliminado";
            return $vec;

        }

        public function insertar($params){
            $ins = "INSERT INTO pago (medio_pago, fo_ventas , fo_cliente , fo_usuario ) 
                    VALUES ('$params->medio_pago',$params->fo_ventas,$params->fo_cliente,$params->fo_usuario)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El pago se ha guardado";
            return $vec;
        }

        public function editar($id,$params){
            $edi = "UPDATE pago 
                    SET medio_pago= '$params->medio_pago', fo_ventas= $params->fo_ventas, fo_cliente= $params->fo_cliente, fo_usuario= $params->fo_usuario 
                    WHERE pago.id_pago= $id";
            mysqli_query($this->conexion, $edi);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La devolucion se ha editado";
            return $vec;

        }

        public function filtro($valor){
            $fil = "SELECT pago.*,ventas.fecha AS fecha, ventas.numero_factura AS factura, ventas.total AS total, cliente.nombre AS cliente, cliente.numero_identificacion AS identificacion, cliente.numero_contacto AS contacto, cliente.correo AS correo, usuario.nombre_usuario AS vendedor 
                    FROM pago 
                    INNER JOIN ventas ON pago.fo_ventas=ventas.id_ventas
                    INNER JOIN cliente ON pago.fo_cliente= cliente.id_cliente
                    INNER JOIN usuario ON pago.fo_usuario= usuario.id_usuario
                    WHERE ventas.fecha LIKE '%$valor%' 
                    OR pago.medio_pago LIKE '%$valor%' 
                    OR ventas.numero_factura LIKE '%$valor%' 
                    OR ventas.total LIKE '%$valor%' 
                    OR cliente.nombre LIKE '%$valor%' 
                    OR cliente.numero_identificacion LIKE '%$valor%' 
                    OR cliente.numero_contacto LIKE '%$valor%' 
                    OR cliente.correo LIKE '%$valor%'
                    OR usuario.nombre_usuario LIKE '%$valor%' ";
            $res = mysqli_query($this->conexion, $fil);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
            }

            return $vec;
        }

    }
?>