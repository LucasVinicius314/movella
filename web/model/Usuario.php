<?php

class Usuario
{
  public static function Create($celular, $email, $endereco, $senha, $usuario, $acesso)
  {
    try {
      $conexao = new PDO(SERVER, UID, PASSWORD);

      $sql = $conexao->prepare("
      insert into tbl_usuario (
        celular
        email
        endereco
        senha
        usuario
        acesso
      )
      values (?, ?, ?, ?, ?, ?)
      ");

      $sql->execute([
        $celular,
        $email,
        $endereco,
        $senha,
        $usuario,
        $acesso,
      ]);

      $error = Movel::CheckSQL($sql);

      if ($error) return (object) [
        'status' => 403,
        'error' => $error,
      ];

      return (object) [
        'status' => 200,
        'error' => null,
      ];
    } catch (PDOException $ex) {
      return (object) [
        'status' => 500,
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
        tbl_usuario
      where id = ?
      limit 1
      ");

      $sql->execute([$id]);

      $error = Movel::CheckSQL($sql);

      if ($error) return (object) [
        'status' => 403,
        'data' => null,
        'error' => $error,
      ];

      return (object) [
        'status' => 200,
        'data' => $sql->fetchObject(),
        'error' => null,
      ];
    } catch (PDOException $ex) {
      return (object) [
        'status' => 500,
        'data' => null,
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
        tbl_usuario
      ");

      $sql->execute();

      $error = Movel::CheckSQL($sql);

      if ($error) return (object) [
        'status' => 403,
        'data' => (object) [],
        'error' => $error,
      ];

      return (object) [
        'status' => 200,
        'data' => $sql->fetchAll(PDO::FETCH_CLASS),
        'error' => null,
      ];
    } catch (PDOException $ex) {
      return (object) [
        'status' => 500,
        'data' => [],
        'error' => $ex,
      ];
    }
  }

  public static function Login($email, $senha)
  {
    try {
      $conexao = new PDO(SERVER, UID, PASSWORD);

      $sql = $conexao->prepare("
      select
        *
      from
        tbl_usuario
      where
        email = ? and
        senha = sha1(?)
      limit 1
      ");

      $sql->execute([$email, $senha]);

      $error = Movel::CheckSQL($sql);

      if ($error) return (object) [
        'status' => 403,
        'data' => null,
        'error' => $error,
      ];

      return (object) [
        'status' => 200,
        'data' => $sql->fetchObject(),
        'error' => null,
      ];
    } catch (PDOException $ex) {
      return (object) [
        'status' => 500,
        'data' => null,
        'error' => $ex,
      ];
    }
  }

  static function CheckSQL($sql)
  {
    return $sql->errorCode() == '00000' ? null : $sql->errorInfo()[2];
  }
}
