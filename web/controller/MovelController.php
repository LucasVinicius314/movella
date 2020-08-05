<?php

require_once '../model/Aluguel.php';
require_once '../model/Categoria.php';
require_once '../model/Movel.php';
require_once '../model/Usuario.php';

class MovelController
{
  public function Create()
  {
    echo 'wip';
    //include 'view_create.php';
  }

  public function Read()
  {
    $id = $_GET['id'] ?? 1;

    $movel = Movel::Read($id);

    if (!$movel) {
      header('location: ./');
      exit;
    }

    include 'view_read.php';
  }

  public function Update()
  {
  }

  public function Delete()
  {
  }

  public function All()
  {
    $moveis = Movel::All();
    $moveis = $moveis->data;

    $categorias = Categoria::All();
    $categorias = $categorias->data;

    include 'view_all.php';
  }

  public function _Create()
  {
    $categoriaId = $_POST['categoriaId'] ?? null;
    $usuarioId = $_POST['usuarioId'] ?? null;
    $descricao = $_POST['descricao'] ?? null;
    $imagem = $_POST['imagem'] ?? null;
    $nome = $_POST['nome'] ?? null;
    $valorMes = $_POST['valorMes'] ?? null;
    $disponivel = $_POST['disponivel'] ?? null;

    $res = Movel::Create($categoriaId, $usuarioId, $descricao, $imagem, $nome, $valorMes, $disponivel);

    echo json_encode($res);
  }
}
