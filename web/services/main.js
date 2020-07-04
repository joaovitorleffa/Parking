
// pegar data atual
function getDate() {
  let date = new Date();

  let year = date.getFullYear();
  let month = date.getMonth() +1;
  let day = date.getDate();

  let hours = date.getHours();
  let minutes = date.getMinutes();
  let seconds = date.getSeconds();
  
  return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
}

// diferença entre datas
function diffDate(dateOne, dateTwo) {
  var hours = Math.abs(new Date(dateOne) - new Date(dateTwo)) / 36e5;
  return hours.toFixed(2);
}

// adicionando cliente
$('#register').click((e) => {
  e.preventDefault();
  let client = $('#client').val();
  let model = $('#model').val();
  let board = $('#board').val();

  if (!model || !client || !board) {
    alert("Preencha todos os campos");
    return;
  }

  let data = { model: model, board: board, client: client };

  createClient(data);
});

// filtrar para relatório
$('#filter').click((e) => {
  e.preventDefault();
  $('#report-result').empty();
  let date1 = $('#date1').val();
  let date2 = $('#date2').val();

  if (!date1 || !date2) {
    alert("Preencha todos os campos");
    return;
  }

  date1 += ':00';
  date2 += ':00';

  let data = { inicio: date1, fim: date2 };

  createReport(data);

});

// adcionar no estacionamento
$(document).on('click', '.add', (e) => {
  let id = e.target.id;

  let date = getDate();
  let data = { id_veiculo: id, entrada: date };

  addToParking(data);
});

// remover do estacionamento
$(document).on('click', '.remove', (e) => {
  // id_veiculo
  const id = e.target.id;
  const date = getDate();
  let value;

  $.get(`${baseUrl}/parking/${id}`, result => {
    const input = result[0].entrada;
    const difference = diffDate(input, date);
    $.get(`${baseUrl}/history/total/${id}`, result => {
      // verificar fidelidade
      const faithfulness = result[0].quantidade_veiculo;
      if (faithfulness == 11)
        value = '0.00 -> Estadia grátis';
      else
        value = (difference * 15.55).toFixed(2);
      
      const response = confirm(`Você está retirando o veículo do estacionamento
                              \nFidelidade(quantidade de vezes estacionado): ${faithfulness}
                              \nEstadia(h): ${difference}
                              \nValor Total(R$): ${value}
                              \nPresione OK para marcar como PAGO`);
      if(response) {
        // adicionar dados ao histórico
        const data = { id_veiculo: id, entrada: input, saida: date, estadia: difference, valor: value };
        addToHistory(data);
      } else {
        return;
      }
    })
  });
});
