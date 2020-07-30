<?php

class Model
{
  public function Create($id)
  {
    try {
      $conexao = new PDO(SERVER, UID, PASSWORD);

      $sql = $conexao->prepare("
      insert into ()
      values (?)
      ");

      $sql->execute([$id]);

      $error = $this->CheckSQL($sql);

      return (object) [
        'success' => true,
        'error' => $error,
      ];
    } catch (PDOException $ex) {
      return (object) [
        'success' => false,
        'errors' => [$ex],
      ];
    }
  }

  public function Read($id)
  {
    try {
      $conexao = new PDO(SERVER, UID, PASSWORD);

      $sql = $conexao->prepare("
      select
        *
      from
        table
      where id = ?
      ");

      $sql->execute([$id]);

      $error = $this->CheckSQL($sql);
      if ($error) echo $error;

      return $sql->fetchObject();
    } catch (PDOException $ex) {
      echo $ex;
      return (object) [];
    }
  }

  public function Update($id)
  {
  }

  public function Delete($id)
  {
  }

  public function All()
  {
    try {
      $conexao = new PDO(SERVER, UID, PASSWORD);

      $sql = $conexao->prepare("
      select
        va.*,
        p.nome as parceiroNome,
        s.nome as servicoNome
      from
        verAgendamento va
        join parceiroServico ps on va.parceiroServicoId = ps.id
        join parceiro p on ps.parceiroId = p.id
        join servico s on ps.servicoId = s.id
      ");

      $sql->execute();

      $error = $this->CheckSQL($sql);
      if ($error) echo $error;

      return $sql->fetchAll(PDO::FETCH_CLASS);
    } catch (PDOException $ex) {
      echo $ex;
      return [];
    }
  }

  function CheckSQL($sql)
  {
    if ($sql->errorCode() == '00000') return null;

    return $sql->errorInfo()[2];
  }
}
