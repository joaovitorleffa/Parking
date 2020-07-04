<?php
  class HistoryModel
  {
    var $result;
    var $conn;
  
    public function __construct()
    {
        require_once("db/ConnectionClass.php");
        $Oconn = new ConnectClass();
        $Oconn->openConnection();
        $this->conn = $Oconn->getConnection();
    }

    public function create($arrayHistory)
    {
      $sql = "INSERT INTO historico (id_veiculo, entrada, saida, estadia, valor)
              VALUE ('".$arrayHistory['id_veiculo']."','".$arrayHistory['entrada']."'
                      , '".$arrayHistory['saida']."', '".$arrayHistory['estadia']."'
                      , '".$arrayHistory['valor']."')";
      
      $this->conn->query($sql);
    }

    public function totalClient($id)
    {
      $sql = "SELECT COUNT(id_veiculo) as quantidade_veiculo
              FROM historico
              WHERE id_veiculo = '".$id."'";
      $this->result = $this->conn->query($sql);
    }

    public function filterHistory($arrayDates)
    {
      $sql = "SELECT COUNT(*) AS quantidade_veiculos, SUM(H.valor) AS valor
              FROM historico AS H 
              WHERE entrada BETWEEN '".$arrayDates['entrada']."' AND '".$arrayDates['saida']."'";
      $this->result = $this->conn->query($sql);
    }

    public function filterHistoryClients($arrayDates)
    {
      $sql = "SELECT H.id_veiculo, V.cliente, V.modelo, H.entrada, H.saida, H.valor
              FROM historico AS H JOIN veiculos AS V ON H.id_veiculo = V.id
              WHERE entrada BETWEEN '".$arrayDates['entrada']."' AND '".$arrayDates['saida']."'";
      $this->result = $this->conn->query($sql);
    }

    public function getConsult() {
      return $this->result;
    }
  }
?>