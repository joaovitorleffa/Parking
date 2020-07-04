<?php 
  class ParkingController 
  {
    var $result;

    public function __construct() {
      require_once("models/ParkingModel.php");
      $this->ParkingModel = new ParkingModel();
    }

    // listar todo o estacionamento
    public function index() 
    {
      $this->ParkingModel->index();
      $result = $this->ParkingModel->getConsult();

      $arrayParking = array();

      while($row = $result->fetch_assoc()) {
          array_push($arrayParking, $row);
      }

      header('Content-Type: application/json');
      echo json_encode($arrayParking);
    }

    // listar veículo específico do estacionamento
    public function show($id)
    {
      $this->ParkingModel->show($id);
      $result = $this->ParkingModel->getConsult();

      $arrayIdParking = array();

      while($row = $result->fetch_assoc()) {
        array_push($arrayIdParking, $row);
      }

      header('Content-Type: application/json');
      echo json_encode($arrayIdParking);
    }

    // adicionar veículo no estacionamento
    public function create() 
    {
      $parking = json_decode(file_get_contents("php://input"));

      $arrayParking["id_veiculo"] = $parking->id_veiculo;
      $arrayParking["entrada"] = $parking->entrada;

      $this->ParkingModel->create($arrayParking);

      header('Content-Type: application/json');
      echo json_encode('{"result":"true"}');
    }

    
    public function spaces($id_veiculo) 
    {
      // verificar se há vagas
      $this->ParkingModel->getSpaces();
      $result = $this->ParkingModel->getConsult();

      $arraySpaces = array();

      while($row = $result->fetch_assoc()) {
          array_push($arraySpaces, $row);
      }
    
      // verifica se o veículo já esta no estácionamento
      $this->ParkingModel->verify($id_veiculo);
      $contain = $this->ParkingModel->getConsult();

      $arrayContain = array();
      while($row = $contain->fetch_assoc()) {
        array_push($arrayContain, $row);
      }

      if($arrayContain) {
        $arraySpaces["space"] = true;
      } else {
        $arraySpaces["space"] = false;
      }

      header('Content-Type: application/json');
      echo json_encode($arraySpaces);
    }

    // deletar veículo do estacionamento
    public function delete($id_veiculo)
    {
      var_dump($id_veiculo);
      $this->ParkingModel->delete($id_veiculo);
    }
  }
