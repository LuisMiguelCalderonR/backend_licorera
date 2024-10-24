<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/cliente.php");

    $control = $_GET['control'];

    $cliente = new Cliente($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $cliente->consulta();
        break;   
        case 'insertar':
            $json = file_get_contents('php://input');
//Prueba            
            //$json= '{"nombre":"prueba","tipo_identificacion":"prueba","numero_identificacion":"prueba","correo":"prueba","direccion":"prueba","numero_contacto":"000000000","fo_ciudad":2,"fo_dpto":2}';
            $params = json_decode($json);
            $vec = $cliente->insertar($params);
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $cliente->eliminar($id);
        break;
        case 'editar':
            $json = file_get_contents ('php://input');
//Prueba
            //$json= '{"nombre":"prueba1","tipo_identificacion":"prueba1","numero_identificacion":"prueba1","correo":"prueba","direccion":"prueba","numero_contacto":"000000000","fo_ciudad":2,"fo_dpto":2}';
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $cliente->editar($id,$params);
        break;
        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $cliente->filtro($dato);
        break;
        case 'consulta_cliente':
            $dato = $_GET['dato'];
            $vec = $cliente->consultar_cliente($dato);
        break;

    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');






?>