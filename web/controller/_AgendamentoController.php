<?php

require_once '../model/Model.php';
require_once '../model/ParceiroServico.php';

class Controller
{
  public function Create()
  {
    include 'view_create.php';
  }

  public function Read()
  {
    $id = $_GET['id'] ?? 1;

    $agendamento = (new Agendamento())->Read($id);
    $parceiroServicos = (new ParceiroServico())->All();

    if (!$agendamento) {
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
    $agendamentos = (new Agendamento())->All();

    include 'view_all.php';
  }

  public function _Create()
  {
    $ids = $_POST['ids'] ?? [];
    $nome = $_POST['nome'] ?? null;
    $celular = $_POST['celular'] ?? null;
    $horario = $_POST['horario'] ?? null;
    $horarioFlexivel = $_POST['horarioFlexivel'] ?? null;
    $servico = $_POST['servico'] ?? null;

    $res = (new Agendamento())->Create($ids, $nome, $celular, $horario, $horarioFlexivel, $servico);

    echo json_encode($res);
  }
}
