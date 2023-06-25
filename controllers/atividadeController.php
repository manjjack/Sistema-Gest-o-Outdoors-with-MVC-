<?php
// Verifica se o valor foi recebido por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['valor'])) {
  // Obtém o valor enviado pelo AJAX
  $valor = $_POST['valor'];

  // Implemente aqui a lógica desejada para determinar se o input deve ser ativado ou desativado
  if ($valor === 'empresa') {
    $resposta = 'ativo';
  } else {
    $resposta = 'inativo';
  }

  // Retorna a resposta ao JavaScript
  echo $resposta;
}
?>