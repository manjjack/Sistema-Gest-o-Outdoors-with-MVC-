

window.addEventListener('DOMContentLoaded', function() {
    
    var formulario = document.querySelector('form');
    
    formulario.reset();
  });

  function validarFormulario() {
    var formulario = document.getElementById('formulario');
    var inputs = formulario.querySelectorAll('input');

    for (var i = 0; i < inputs.length; i++) {
      if (!inputs[i].value) {
        alert('Por favor, preencha todos os campos obrigatórios!');
        return false;
      }
    }

    return true;
  }

  // Sucesso no envio 

  function enviarFormulario() {
    // Lógica de envio do formulário aqui

    // Exibir mensagem de sucesso
    exibirMensagem('Formulário enviado com sucesso!', 'success');

    // Impedir o envio padrão do formulário
    return false;
  }

  function exibirMensagem(mensagem, tipo) {
    var mensagemDiv = document.createElement('div');
    mensagemDiv.className = 'mensagem-' + tipo;
    mensagemDiv.textContent = mensagem;

    var formulario = document.getElementById('meuFormulario');
    formulario.appendChild(mensagemDiv);

    // Remover a mensagem após alguns segundos
    setTimeout(function() {
      formulario.removeChild(mensagemDiv);
    }, 3000); // Tempo em milissegundos (neste exemplo, 3 segundos)

  }
//validar campos
function validate(val) {
    const inputs = [
      document.getElementById("nomeEmpresa"),
      document.getElementById("tipoCliente"),
      document.getElementById("atividade"),
      document.getElementById("municipio"),
      document.getElementById("comuna"),
      document.getElementById("nacionalidade"),
      document.getElementById("morada"),
      document.getElementById("email"),
      document.getElementById("tel"),
      document.getElementById("user")
    ];
  
    let flag = true;
  
    inputs.forEach((input, index) => {
      if (val >= index + 1 || val == 0) {
        if (input.value == "") {
          input.style.borderColor = "red";
          flag = false;
        } else {
          input.style.borderColor = "green";
        }
      }
    });
  
    return flag;
  }
  