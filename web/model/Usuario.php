<?php

class Usuario
{
  public static function Create($celular, $email, $senha, $repeatsenha, $usuario, $acesso)
  {
    try {
      $conexao = new PDO(SERVER, UID, PASSWORD);

      if ($celular == null) throw new Exception("Celular vazio");
      if ($email == null) throw new Exception("Email vazio");
      if ($senha == null) throw new Exception("Senha vazia");
      if ($repeatsenha == null) throw new Exception("Repetição de senha vazia");
      if ($usuario == null) throw new Exception("Usuario vazio");

      if ($senha !== $repeatsenha) throw new Exception("Senha não confere");

      $sql = $conexao->prepare("
      insert into tbl_usuario (
        celular,
        email,
        senha,
        usuario,
        acesso
      )
      values (?, ?, sha1(?), ?, ?)
      ");

      $sql->execute([
        $celular,
        $email,
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
    } catch (Exception $ex) {
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

      $res = $sql->fetchObject();

      if ($res === false) throw new Exception('Senha incorreta ou usuário não existente');

      if ($error) return (object) [
        'status' => 403,
        'data' => null,
        'error' => $error,
      ];

      return (object) [
        'status' => 200,
        'data' => $res,
        'error' => null,
      ];
    } catch (PDOException $ex) {
      return (object) [
        'status' => 500,
        'data' => null,
        'error' => $ex->getMessage(),
      ];
    }
    catch (Exception $ex) {
      return (object) [
        'status' => 500,
        'data' => null,
        'error' => $ex->getMessage(),
      ];
    }
  }

  static function CheckSQL($sql)
  {
    return $sql->errorCode() == '00000' ? null : $sql->errorInfo()[2];
  }
}
