<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/pago.php");

    $control = $_GET['control'];

    $pago = new Pago($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $pago->consulta();
        break;   
        case 'insertar':
            $json = file_get_contents('php://input');
//Prueba            
            //$json= '{"medio_pago":"prueba","fo_ventas":1,"fo_cliente":2,"fo_usuario":1}';
            $params = json_decode($json);
            $vec = $pago->insertar($params);
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $pago->eliminar($id);
        break;
        case 'editar':
            $json = file_get_contents ('php://input');
//Prueba
            //$json= '{"medio_pago":"prueba1","fo_ventas":1,"fo_cliente":2,"fo_usuario":2}';
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $pago->editar($id,$params);
        break;
        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $pago->filtro($dato);
        break;

    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');






?>