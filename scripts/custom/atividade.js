
$(document).ready(function() {
    // Função para enviar o valor selecionado do select para o arquivo PHP
    function enviar() {
      var valor = $('#tipoCliente').val();
  
      $.ajax({
        url: '../controllers/atividadeController.php',
        type: 'POST',
        data: { valor: valor },
        success: function(response) {
          // Atualiza o estado do input com base na resposta recebida
          if (response === 'ativo') {
            $('#atividade').prop('disabled', false);
          } else {
            $('#atividade').prop('disabled', true);
            $('#atividade').css('background-color', ' gainsboro');
          }
        }
      });
    }
  
    // Evento onchange do select para chamar a função enviarValor
    $('#tipoCliente').on('change', enviar);
  });