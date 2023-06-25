<?php
include_once '../model/Comuna.php';
include_once '../repositories/ComunaRepository.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'buscarDados') {
  // Criar uma instância da classe "converte"
  $converte = new ComunaRepository();

  // Obter o valor do parâmetro "id"
  $id = $_POST['id'];

  // Obter os dados desejados usando as funções PHP com os parâmetros
  $municipio = $converte->getNomeMunicipio($converte->getFk($id));
  $provincia = $converte->getNomeProvinciaByComuna($converte->getFk($id));

  // Criar um array com os dados
  $dados = [
    'municipio' => $municipio,
    'provincia' => $provincia
  ];
  
  // Converter o array em formato JSON
  $json = json_encode($dados);
  
  // Retornar a resposta JSON
  echo $json;
}
?>