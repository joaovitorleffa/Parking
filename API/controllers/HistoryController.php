<?php
  class HistoryController
  {
    var $result;

    public function __construct() 
    {
      require_once("models/HistoryModel.php");
      $this->HistoryModel = new HistoryModel();
    }

    // criar item no histórico
    public function create() 
    {
      $history = json_decode(file_get_contents("php://input"));

      $arrayHistory["id_veiculo"] = $history->id_veiculo;
      $arrayHistory["entrada"] = $history->entrada;
      $arrayHistory["saida"] = $history->saida;
      $arrayHistory["estadia"] = $history->estadia;
      $arrayHistory["valor"] = $history->valor;

      $this->HistoryModel->create($arrayHistory);
      
      echo ($history->id_veiculo);
    }

    // quantidade de vezes que o veículo esteve no estacionamento
    public function show($id)
    {
      $this->HistoryModel->totalClient($id);
      $result = $this->HistoryModel->getConsult();

      $arrayClient = array();

      while($row = $result->fetch_assoc()) {
        array_push($arrayClient, $row);
      }

      header('Content-Type: application/json');
      echo json_encode($arrayClient);
    }

    // filtra o histórico por data
    public function filter()
    {
      $dates = json_decode(file_get_contents("php://input"));

      $arrayDate["entrada"] = $dates->inicio;
      $arrayDate["saida"] = $dates->fim;

      $arrayFilter = array();

      $this->HistoryModel->filterHistoryClients($arrayDate);
      $result = $this->HistoryModel->getConsult();
      
      while($row = $result->fetch_assoc()) {
        array_push($arrayFilter, $row);
      }

      header('Content-Type: application/json');
      echo json_encode($arrayFilter);
    }

    // pega o valor total gerado entre as datas
    public function amountFilter()
    {
      $dates = json_decode(file_get_contents("php://input"));

      $arrayDate["entrada"] = $dates->inicio;
      $arrayDate["saida"] = $dates->fim;

      $this->HistoryModel->filterHistory($arrayDate);
      $result = $this->HistoryModel->getConsult();
      
      $arrayFilter = array();
      while($row = $result->fetch_assoc()) {
        array_push($arrayFilter, $row);
      }

      header('Content-Type: application/json');
      echo json_encode($arrayFilter);
    }
  }
?>