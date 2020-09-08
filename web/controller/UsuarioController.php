<?php

require_once '../model/Aluguel.php';
require_once '../model/Categoria.php';
require_once '../model/Movel.php';
require_once '../model/Usuario.php';
require_once '../model/Contato.php';

class UsuarioController
{
  public function Create()
  {
    $celular = '00000000000';
    $email = $_POST['email'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $imagem = $_POST['imagem'] ?? null;
    $nome = $_POST['nome'] ?? null;
    $valorMes = $_POST['valorMes'] ?? null;
    $disponivel = $_POST['disponivel'] ?? null;

    //$res = Movel::Create($categoriaId, $usuarioId, $descricao, $imagem, $nome, $valorMes, $disponivel);
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

  public function Login()
  {
    $email = $_POST['email'] ?? null;
    $senha = $_POST['senha'] ?? null;

    if (isset($_POST['email']) && isset($_POST['senha'])) {

      $res = Usuario::Login($email, $senha);
      
      if ($res->error) { 
        $_SESSION['msg'] = $res->error;
        header('location: ./');
      }
      else {
        $_SESSION['usuario'] = $res->data;
        $_SESSION['msg'] = 'Login efetuado';
        header('location: ../moveis');
      }

    }
  }

  public function Logout()
  {
    unset($_SESSION['usuario']);

    header('location: ../moveis');
  }

  public function index()
  {
    include 'view_index.php';
  }

  public function signin()
  {
    include 'view_index.php';
  }

  public function _signin()
  {
    $username = $_POST['username'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $repeatpassword = $_POST['repeat-password'] ?? null;

    $res = Usuario::Create('00000000000', $email, $password, $repeatpassword, $username, 1);

    if ($res->error) { 
      $_SESSION['msg'] = $res->error->getMessage();
      header('location: ./');
    }
    else {
      $_SESSION['msg'] = 'Conta registrada';
      header('location: ../login');
    }
  }

  public function _contato()
  {
    $nome = $_POST['nome'] ?? null;
    $email = $_POST['email'] ?? null;
    $assunto = $_POST['assunto'] ?? null;
    $mensagem = $_POST['mensagem'] ?? null;

    Contato::Create($nome, $email, $assunto, $mensagem);

    header('location: ../contato');
  }

  public function contato()
  {
    include 'view_index.php';
  }
}
