<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/devoluciones.php");

    $control = $_GET['control'];

    $devoluciones = new Devoluciones($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $devoluciones->consulta();
        break;   
        case 'insertar':
            $json = file_get_contents('php://input');
//Prueba            
            //$json= '{"fecha_recoleccion":"2024-12-12","orden_devolucion":"prueba","cantidad":200,"fo_productos":1,"fo_proveedor":1}';
            $params = json_decode($json);
            $vec = $devoluciones->insertar($params);
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $devoluciones->eliminar($id);
        break;
        case 'editar':
            $json = file_get_contents ('php://input');
//Prueba
            //$json= '{"fecha_recoleccion":"2036-12-12","orden_devolucion":"prueba1","cantidad":2002,"fo_productos":2,"fo_proveedor":2}';
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $devoluciones->editar($id,$params);
        break;
        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $devoluciones->filtro($dato);
        break;

    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');






?>