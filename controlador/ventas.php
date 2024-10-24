<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/ventas.php");

    $control = $_GET['control'];

    $ventas = new Ventas($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $ventas->consulta();
        break;   
        case 'insertar':
            $json = file_get_contents('php://input');
//Prueba            
            //$json= '{"fecha":"2024-10-10","numero_factura":"prueba","cantidad":500000,"total":90258000,"fo_usuario":1,"fo_cliente":"2","fo_productos":6}';
            $params = json_decode($json);
            $vec = $ventas->insertar($params);
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $ventas->eliminar($id);
        break;
        case 'editar':
            $json = file_get_contents ('php://input');
//Prueba
            //$json= '{"fecha":"2024-11-11","numero_factura":"prueba1","cantidad":511111,"total":1111100,"fo_usuario":2,"fo_cliente":3,"fo_productos":1}';
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $ventas->editar($id,$params);
        break;
        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $ventas->filtro($dato);
        break;

    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');






?>