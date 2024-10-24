<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/pedidos.php");

    $control = $_GET['control'];

    $pedidos = new Pedidos($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $pedidos->consulta();

            $datosj = json_encode($vec);
            echo $datosj;
            header('Content-Type: application/json');
        break;   
        case 'insertar':
            $json = file_get_contents('php://input');
//Prueba            
            // $json= '{"fecha":"2024-10-10",
            // "fo_cliente":1,
            // "productos":[
            // [
            // "0000001",
            // "poker 350 ml",
            // 3000,
            // 1,
            // 3000
            // ],
            // [
            // "0000009",
            // "costeña lata 350 ml",
            // 2800,
            // 1,
            // 2800
            // ]
            //     ],
            // "subtotal":5800,
            // "total":5800,
            // "fo_usuario":1}';

            $params = json_decode($json);
            $texto_arreglo = serialize($params->productos);
            $params-> productos= $texto_arreglo;

            $vec= $pedidos->insertar($params);

            $datosj = json_encode($vec);
            echo $datosj;
            header('Content-Type: application/json');
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $pedidos->eliminar($id);
            $datosj = json_encode($vec);
            echo $datosj;
            header('Content-Type: application/json');
        break;
        // case 'remover':
        //     $id = $_GET['id'];
        //     $vec = $pedidos->remover($id);
        //     $datosj = json_encode($vec);
        //     echo $datosj;
        //     header('Content-Type: application/json');
        // break;
        case 'productos':
            $id = $_GET['id'];
            $vec = $pedidos->consulta_productos($id);
            $datosj = json_encode($vec);
            echo $datosj;
            header('Content-Type: application/json');
        break;
    }

?>