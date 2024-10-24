<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/productos.php");

    $control = $_GET['control'];

    $productos = new Productos($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $productos->consulta();
        break;   
        case 'insertar':
            $json = file_get_contents('php://input');
//Prueba            
            //$json= '{"nombre":"prueba","codigo":"prueba","precio_und":3500,"precio_venta":4000,"cantidad_stock":6000,"fo_categoria":1}';
            $params = json_decode($json);
            $vec = $productos->insertar($params);
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $productos->eliminar($id);
        break;
        case 'editar':
            $json = file_get_contents ('php://input');
//Prueba
            //$json= '{"nombre":"prueba1","codigo":"prueba1","precio_und":35080,"precio_und":40080,"cantidad_stock":68000,"fo_categoria":2}';
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $productos->editar($id,$params);
        break;
        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $productos->filtro($dato);
        break;

    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');






?>