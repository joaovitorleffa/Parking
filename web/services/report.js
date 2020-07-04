function createReport(data) {
  $.ajax({
    type: 'POST',
    url: `${baseUrl}/history/amount`,
    data: JSON.stringify(data),
    contentType: 'application/json',
    dataType: 'json'
  })
  .done(result => {
    $('.amount').html(result[0].quantidade_veiculos);
    $('.value').html(result[0].valor);
  })

  $.ajax({
    type: 'POST',
    url: `${baseUrl}/history/filter`,
    data: JSON.stringify(data),
    contentType: 'application/json',
    dataType: 'json'
  })
  .done(result => {
    let length = result.length;

    if(!length) {
      $('#report-content').hide();
      $('#no-report').html(
        '<h2>Não há registro de veículos</h2>'
      )
    } else {
      $('#no-report').hide();
      $('#report-content').show();
      result.map(item => {
        $('#report-result').append(
          '<tr class="item">',
            `<td>${item.id_veiculo}</td>`,
            `<td>${item.cliente}</td>`,
            `<td>${item.modelo}</td>`,
            `<td>${item.entrada}</td>`,
            `<td>${item.saida}</td>`,
            `<td>${item.valor}</td>`,
          '</tr>'
        );
      });
    }
  });
}