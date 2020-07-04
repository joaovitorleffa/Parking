<?php
    class ClientsModel {
        var $result;
        var $conn;

        public function __construct()
        {
            require_once("db/ConnectionClass.php");
            $Oconn = new ConnectClass();
            $Oconn->openConnection();
            $this->conn = $Oconn->getConnection();
        }

        public function show($id_cliente) {
            $sql = "SELECT * FROM veiculos WHERE id = '".$id_cliente."';";
            $this->result = $this->conn->query($sql);
        }

        public function index()
        {
            $sql = 'SELECT * FROM veiculos ORDER BY id';
            $this->result = $this->conn->query($sql);
        }

        public function create($arrayClient) 
        {
            $sql = "INSERT INTO veiculos (modelo, placa, cliente)
                    VALUES ('".$arrayClient['model']."','".$arrayClient['board']."','".$arrayClient['client']."');";
            $this->conn->query($sql);
            
            $this->result = $this->conn->insert_id;
        }

        public function verify ($board)
        {
            $sql = "SELECT * FROM veiculos WHERE placa = '".$board."'";

            $this->result = $this->conn->query($sql);
        }

        public function getConsult() 
        {
            return $this->result;
        }
    }
?>