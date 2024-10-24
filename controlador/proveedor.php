<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/proveedor.php");

    $control = $_GET['control'];

    $proveedor = new Proveedor($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $proveedor->consulta();
        break;   
        case 'insertar':
            $json = file_get_contents('php://input');
//Prueba            
            //$json= '{"nombre":"prueba","nit":"prueba","contacto":"prueba","direccion":"prueba","fo_ciudad":3,"fo_dpto":3}';
            $params = json_decode($json);
            $vec = $proveedor->insertar($params);
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $proveedor->eliminar($id);
        break;
        case 'editar':
            $json = file_get_contents ('php://input');
//Prueba
            //$json= '{"nombre":"prueba1","nit":"prueba1","contacto":"prueba1","direccion":"prueba1","fo_ciudad":3,"fo_dpto":3}';
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $proveedor->editar($id,$params);
        break;
        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $proveedor->filtro($dato);
        break;

    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');






?>