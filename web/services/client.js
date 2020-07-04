const baseUrl = 'http://localhost/estacionamento/API/index.php';

function indexClient() {
  $.get(`${baseUrl}/clients`, result => {
    let length = result.length;

    if (!length) {
      $('#vehicles-content').hide();
      $('#no-vehicles').html(
        '<h2>Não há veículos cadastrados</h2>'
      )
    } else {
      $('#no-vehicles').hide();
      $('#vehicles-content').show();
      result.map(item => {
        $('#result').append(
          '<tr class="item">',
            `<td>${item.id}</td>`,
            `<td>${item.modelo}</td>`,
            `<td>${item.placa}</td>`,
            `<td>${item.cliente}</td>`,
            `<td><button class='btn add' id=${item.id}>Entrar</button></td>`,
          '</tr>'
        );
      });
    }
  });
}

function createClient(data) {
  const board = data.board;
  $.get(`${baseUrl}/clients/verify-client/${board}`, result => {
    if(!result.contain) {
      $.ajax({
        type: 'POST',
        url: `${baseUrl}/clients`,
        data: JSON.stringify(data),
        contentType: 'application/json',
        dataType: 'json',
        success: () => { 
          $('#result').empty();
          indexClient();
        }
      });
    } else {
      alert('O veículo com esta placa já está cadastrado');
    }
  });
}

indexClient();

