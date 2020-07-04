<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Controle de estacionamento</title>
  <!-- jQuey -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">
  <!-- Reset Css -->
  <link rel="stylesheet" href="styles/reset.css">
  <!-- Global Css -->
  <link rel="stylesheet" href="styles/global.css">
  <!-- Header Css -->
  <link rel="stylesheet" href="styles/header.css">
  <!-- Form Css -->
  <link rel="stylesheet" href="styles/form.css">
  <!-- Table Css -->
  <link rel="stylesheet" href="styles/table.css">
</head>

<body>
  <header id="header">
    <h1>Controle de estacionamento</h1>
  </header>

  <section class="wrapp">
    <h1>Cadastrar Veículo</h1>
    <form class="form" autocomplete="off">
      <div class="group">
        <label for="client">Cliente</label>
        <input type="text" name="client" id="client">
      </div>

      <div class="group">
        <label for="model">Modelo</label>
        <input type="text" name="model" id="model">
      </div>

      <div class="group">
        <label for="board">Placa</label>
        <input type="text" name="board" id="board">
      </div>

      <button class="btn-send" id="register">Cadastrar</button>
    </form>
  </section>

  <section class="wrapp" id="vehicles">
    <h1>Veículos Cadastrados</h1>
    <div id="no-vehicles"></div>
    <table class="table" id="vehicles-content">
      <tr>
        <th>Código</th>
        <th>Modelo</th>
        <th>Placa</th>
        <th>Cliente</th>
        <th>Ação</th>
      </tr>
      <tbody id="result"></tbody>
    </table>
  </section>

  <section class="wrapp" id="parking">
    <h1>Estacionamento</h1>
    <div id="no-parking"></div>
    <div class="controller-content">
      <div class="controller">
        <p>Vagas:</p>
        <div class="btn spaces"></div>
      </div>
      <div class="controller">
        <p>Ocupadas:</p>
        <div class="btn parked"></div>
      </div>
    </div>
    <table class="table" id="parking-content">
      <tr>
        <th>Cód.</th>
        <th>Cliente</th>
        <th>Modelo</th>
        <th>Entrada</th>
      </tr>
      <tbody id="result-content"></tbody>
    </table>
  </section>

  <section class="wrapp">
    <h1>Relatório</h1>
    <form class="form">
      <div class="group">
        <label for="date1">Data Inicial</label>
        <input type="datetime-local" name="date1" id="date1">
      </div>
      <div class="group">
        <label for="date2">Data Inicial</label>
        <input type="datetime-local" name="date2" id="date2">
      </div>
      <button class="btn-send" id="filter">Gerar Relatório</button>
    </form>
  </section>

  <section class="wrapp" id="report">
    <div class="controller-content">
      <div class="controller">
        <p>Quant. Veículos:</p>
        <div class="btn amount"></div>
      </div>
      <div class="controller">
        <p>Valor total (R$):</p>
        <div class="btn value"></div>
      </div>
    </div>
    <div id="no-report"></div>
    <table class="table" id="report-content">
      <tr>
        <th>Cod. Cliente</th>
        <th>Cliente</th>
        <th>Modelo</th>
        <th>Entrada</th>
        <th>Saída</th>
        <th>Valor</th>
      </tr>
      <tbody id="report-result"></tbody>
    </table>
  </section>

  <script src="services/client.js"></script>
  <script src="services/parking.js"></script>
  <script src="services/history.js"></script>
  <script src="services/report.js"></script>
  <script src="services/main.js"></script>
</body>

</html>