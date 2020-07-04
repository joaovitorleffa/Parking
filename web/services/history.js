

function addToHistory(dataItem) {
  $.ajax({
    type: 'POST',
    url: `${baseUrl}/history`,
    data: JSON.stringify(dataItem),
    contentType: 'application/json',
    dataType: 'json'
  });
  deleteParking(dataItem.id_veiculo);
}