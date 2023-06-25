
function buscarDados(id1) {
  var id = id1; // O valor do parâmetro "id" que você deseja enviar

  $.ajax({
    url: '../controllers/arquivoController.php',
    type: 'POST',
    data: {
      acao: 'buscarDados',
      id: id
    },
    success: function (response) {
      var dados = JSON.parse(response);
   
      // Exibir os resultados
      $('#municipio').val(dados.municipio);
      $('#provincia').val(dados.provincia);
    }
  });
}
