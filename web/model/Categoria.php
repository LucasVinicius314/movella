<?php

class Categoria
{
  public static function Create($nome)
  {
    try {
      $conexao = new PDO(SERVER, UID, PASSWORD);

      $sql = $conexao->prepare("
      insert into tbl_categoria (
        nome
      )
      values (?)
      ");

      $sql->execute([
        $nome,
      ]);

      $error = Movel::CheckSQL($sql);

      return (object) [
        'success' => true,
        'error' => $error,
      ];
    } catch (PDOException $ex) {
      return (object) [
        'success' => false,
        'error' => $ex,
      ];
    }
  }

  public static function Read($id)
  {
    try {
      $conexao = new PDO(SERVER, UID, PASSWORD);

      $sql = $conexao->prepare("
      select
        *
      from
        tbl_categoria
      where id = ?
      ");

      $sql->execute([$id]);

      $error = Movel::CheckSQL($sql);

      return (object) [
        'success' => true,
        'data' => $sql->fetchObject(),
        'error' => $error,
      ];
    } catch (PDOException $ex) {
      return (object) [
        'success' => false,
        'data' => (object) [],
        'error' => $ex,
      ];
    }
  }

  public static function Update($id)
  {
  }

  public static function Delete($id)
  {
  }

  public static function All()
  {
    try {
      $conexao = new PDO(SERVER, UID, PASSWORD);

      $sql = $conexao->prepare("
      select
        *
      from
        tbl_categoria
      ");

      $sql->execute();

      $error = Movel::CheckSQL($sql);

      return (object) [
        'success' => true,
        'data' => $sql->fetchAll(PDO::FETCH_CLASS),
        'error' => $error,
      ];
    } catch (PDOException $ex) {
      return (object) [
        'success' => false,
        'data' => [],
        'error' => $ex,
      ];
    }
  }

  static function CheckSQL($sql)
  {
    return $sql->errorCode() == '00000' ? null : $sql->errorInfo()[2];
  }
}
