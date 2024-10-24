<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/departamento.php");

    $control = $_GET['control'];

    $departamento = new Departamento($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $departamento->consulta();
        break;   
        case 'insertar':
            $json = file_get_contents('php://input');
//Prueba            
            //$json= '{"nombre":"prueba"}';
            $params = json_decode($json);
            $vec = $departamento->insertar($params);
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $departamento->eliminar($id);
        break;
        case 'editar':
            $json = file_get_contents ('php://input');
//Prueba
            //$json= '{"nombre":"prueba1"}';
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $departamento->editar($id,$params);
        break;
        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $departamento->filtro($dato);
        break;

    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');






?>