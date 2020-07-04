<?php

$request_method = $_SERVER["REQUEST_METHOD"];
//$header = apache_request_headers();
//$content = file_get_contents('php://input');
$server = $_SERVER;
//$host = $_SERVER['HTTP_HOST'];
// Retorna o caminho do script atual
$local = $_SERVER['SCRIPT_NAME'];
// Retorna o URI da página atual
$uri = $_SERVER['REQUEST_URI']; 
$rout = str_replace($local, "", $uri);


// CORS HEADERS
header("Access-Control-Allow-Origin: *");

$uriSegments = explode("/", $rout);

    if(isset($uriSegments[1])) { 
        switch($uriSegments[1]) {
            case 'clients':
                require_once("controllers/ClientsController.php");
                $Clients = new ClientsController();

                switch($request_method) 
                {
                        case 'GET': 
                            if(!isset($uriSegments[2]))
                                $Clients->index();
                            else if($uriSegments[2] === 'verify-client')
                                $Clients->verify($uriSegments[3]);
                            else 
                                $Clients->show($uriSegments[2]);
                        break;
                        case 'POST': 
                            $Clients->create(); 
                        break;
                }
            break;
            case 'parking':
                require_once("controllers/ParkingController.php");
                $Parking = new ParkingController();
                switch($request_method) 
                {
                    case 'GET': 
                        if(!isset($uriSegments[2]))
                            $Parking->index();
                        else
                            if($uriSegments[2] === 'spaces')
                                $Parking->spaces($uriSegments[3]);
                            else 
                                $Parking->show($uriSegments[2]);
                    break;
                    case 'POST': 
                        $Parking->create();
                    break;
                    case 'DELETE':
                        $Parking->delete($uriSegments[2]);
                    break;
                }
            break;
            case 'history':
                require_once("controllers/HistoryController.php");
                $History = new HistoryController();
                switch($request_method)
                {   
                    case 'GET':
                        // if(!isset($uriSegments[2]))
                        //     $History->index();
                        if($uriSegments[2] === 'total')
                            $History->show($uriSegments[3]);
                    break;
                    case 'POST':
                        if(!isset($uriSegments[2]))
                        $History->create();
                        if($uriSegments[2] === 'filter')
                            $History->filter();
                        if($uriSegments[2] === 'amount')
                            $History->amountFilter();
                    break;
                }
            break;
        }
    }
