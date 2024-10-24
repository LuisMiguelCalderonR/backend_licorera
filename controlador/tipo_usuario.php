<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/tipo_usuario.php");

    $control = $_GET['control'];

    $tipo_usuario = new Tipo_usuario($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $tipo_usuario->consulta();
        break;   
        case 'insertar':
            $json = file_get_contents('php://input');
//Prueba            
            //$json= '{"tipo_usuario":"prueba"}';
            $params = json_decode($json);
            $vec = $tipo_usuario->insertar($params);
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $tipo_usuario->eliminar($id);
        break;
        case 'editar':
            $json = file_get_contents ('php://input');
//Prueba
            //$json= '{"tipo_usuario":"prueba1"}';
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $tipo_usuario->editar($id,$params);
        break;
        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $tipo_usuario->filtro($dato);
        break;

    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');






?>