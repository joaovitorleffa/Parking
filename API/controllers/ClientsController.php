<?php
    class ClientsController {
        var $ClientModel;

        public function __construct() 
        {
            require_once("models/ClientsModel.php");
            $this->ClientModel = new ClientsModel();
        }

        // busca todos os clientes
        public function index() 
        {
            $this->ClientModel->index();
            $result = $this->ClientModel->getConsult();

            $arrayClients = array();

            while($row = $result->fetch_assoc()) {
                array_push($arrayClients, $row);
            }

            header('Content-Type: application/json');
            echo json_encode($arrayClients);
        }

        // busca um cliente específico 
        public function show($id) 
        {
            $this->ClientModel->show($id);
            $result = $this->ClientModel->getConsult();

            $client = $result->fetch_assoc();

            header('Content-Type: application/json');
            echo json_encode($client);
        }

        // cria um novo cliente
        public function create() 
        {
            $client = json_decode(file_get_contents("php://input"));

            $arrayClient["model"] = $client->model;
            $arrayClient["board"] = $client->board;
            $arrayClient["client"] = $client->client;

            $this->ClientModel->create($arrayClient);

            $result = $this->ClientModel->getConsult();

            header('Content-Type: application/json');
            echo json_encode($result);
        }

        public function verify($board) 
        {
            $this->ClientModel->verify($board);
            $result = $this->ClientModel->getConsult();
            
            $arrayResult = array();

            while($row = $result->fetch_assoc()) {
                array_push($arrayResult, $row);
            }

            $arrayContain = array();
            if($arrayResult) {
                $arrayContain["contain"] = true;
            } else {
                $arrayContain["contain"] = false;
            }

            header('Content-Type: application/json');
            echo json_encode($arrayContain);
        }
   
    }
?>