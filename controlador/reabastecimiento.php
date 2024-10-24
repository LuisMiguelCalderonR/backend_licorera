<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/reabastecimiento.php");

    $control = $_GET['control'];

    $reabastecimiento = new Reabastecimiento($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $reabastecimiento->consulta();
        break;   
        case 'insertar':
            $json = file_get_contents('php://input');
//Prueba            
            //$json= '{"fecha":"2025-03-03","orden_compra":"000prueba","cantidad_comprada":369,"precio_total":369,"fo_producto":2,"fo_usuario":3,"fo_proveedor":1}';
            $params = json_decode($json);
            $vec = $reabastecimiento->insertar($params);
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $reabastecimiento->eliminar($id);
        break;
        case 'editar':
            $json = file_get_contents ('php://input');
//Prueba
            //$json= '{"fecha":"2025-03-01","orden_compra":"000prueba1","cantidad_comprada":3691,"precio_total":3691,"fo_producto":2,"fo_usuario":3,"fo_proveedor":1}';
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $reabastecimiento->editar($id,$params);
        break;
        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $reabastecimiento->filtro($dato);
        break;

    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');






?>