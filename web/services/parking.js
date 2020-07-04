
// vagas
const  spaces = 20;

// criar estacionamento
function createParking() {
  $.get(`${baseUrl}/parking`, result => {

    if (!result.length) {
      $('.spaces').html('20');
      $('.parked').html('0');
      // table id="parking-content"
      $('#parking-content').hide();
      $('#no-parking').html(
        "<h2>Não há veículos estacionados</h2 >"
      )
    } else {
      $('.spaces').html(spaces - result.length);
      $('.parked').html(result.length);
      $('#no-parking').hide();
      $('#parking-content').show();
      result.map(item => {
        $('#result-content').append(
          "<tr class='item'>",
          `<td>${item.id_veiculo}</td>`,
          `<td>${item.cliente}</td>`,
          `<td>${item.modelo}</td>`,
          `<td>${item.entrada}</td>`,
          `<td><button class='btn remove' id=${item.id_veiculo}>Sair</button></td>`,
          "</tr>"
        );
      });
    }
  });
}

function addToParking(dataItem) {
  const id_veiculo = dataItem.id_veiculo;

  $.get(`${baseUrl}/parking/spaces/${id_veiculo}`, result => {
    // verifica se o veículo já está estácionado
    if (!result.space) {
      // verifica o número de vagas
      if (result[0].vagas < spaces) {
        $.ajax({
          type: 'POST',
          url: `${baseUrl}/parking`,
          data: JSON.stringify(dataItem),
          contentType: 'application/json',
          dataType: 'json',
        })
        .done(
          $('#result-content').empty(),
          createParking()
        )
      }
      else {
        alert('Não há mais vagas');
      }
    } else {
      alert("Veículo já esta no estacionamento");
    }
  });

}

function deleteParking(id)
{
  $.ajax({
    type: 'DELETE',
    url: `${baseUrl}/parking/${id}`,
    success: () => { 
      $('#result-content').empty();
      createParking() 
    }
  })
}

createParking();
//getSpaces();

