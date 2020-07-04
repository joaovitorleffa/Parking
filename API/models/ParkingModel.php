<?php
  class ParkingModel {
    var $result;
    var $conn;
  
    public function __construct()
    {
        require_once("db/ConnectionClass.php");
        $Oconn = new ConnectClass();
        $Oconn->openConnection();
        $this->conn = $Oconn->getConnection();
    }

    public function index()
    {
        $sql = 'SELECT E.id, E.id_veiculo, V.cliente, V.modelo, E.entrada 
                FROM estacionamento AS E 
                JOIN veiculos AS V ON E.id_veiculo = V.id';
        $this->result = $this->conn->query($sql);
    }

    public function show($id) 
    {
      $sql = "SELECT * FROM estacionamento WHERE id_veiculo = '".$id."'";

      $this->result = $this->conn->query($sql);
    }

    public function create($arrayParking) 
    {
      $sql = "INSERT INTO estacionamento (id_veiculo, entrada)
              VALUES ('".$arrayParking['id_veiculo']."','".$arrayParking['entrada']."');";
      $this->conn->query($sql);

      $this->result = $this->conn->insert_id;
    }

    public function getSpaces()
    {
      $sql = "SELECT COUNT(*) AS vagas FROM estacionamento";

      $this->result = $this->conn->query($sql);
    }

    public function verify($id) 
    {
      $sql = "SELECT * FROM estacionamento WHERE id_veiculo = '".$id."'";

      $this->result = $this->conn->query($sql);
    }

    public function delete($id)
    {
      $sql = "DELETE FROM estacionamento WHERE id_veiculo='".$id."';";
      $this->conn->query($sql); 
    }

    public function getConsult() {
      return $this->result;
    }
  }
?>