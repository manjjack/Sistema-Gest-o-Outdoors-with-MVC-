// Adicionar evento de escuta de entrada aos campos de senha
var senha1 = document.getElementById('senha1');
var senha2 = document.getElementById('senha2');
var mensagemSenha = document.getElementById('mensagemSenha');

senha1.addEventListener('input', validarSenhas);
senha2.addEventListener('input', validarSenhas);

function validarSenhas() {
  var senha1Valor = senha1.value;
  var senha2Valor = senha2.value;

  var mensagem = senha1Valor === senha2Valor ? 'Senhas coincidem' : 'Senhas não coincidem';
  mensagemSenha.textContent = mensagem;
}