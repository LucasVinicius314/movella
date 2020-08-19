<?php

class Movel
{
  public static function Create($categoriaId, $usuarioId, $descricao, $imagem, $nome, $valorMes, $disponivel)
  {
    try {
      $conexao = new PDO(SERVER, UID, PASSWORD);

      $sql = $conexao->prepare("
      insert into tbl_movel (
        categoriaId
        usuarioId
        descricao
        imagem
        nome
        valorMes
        disponivel
      )
      values (?, ?, ?, ?, ?, ?, ?)
      ");

      $sql->execute([
        $categoriaId,
        $usuarioId,
        $descricao,
        $imagem,
        $nome,
        $valorMes,
        $disponivel,
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
        view_movel
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
        view_movel
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

  public static function Paginacao($categoria, $pagina, $quantidade)
  {
    try {
      $conexao = new PDO(SERVER, UID, PASSWORD);

      $offset = ($pagina - 1) * $quantidade;

      $sql = $conexao->prepare("
      select
        *
      from
        view_movel
      where
        categoria = ?
      limit $quantidade offset $offset
      ");

      $sql->execute([$categoria]);

      $error = Movel::CheckSQL($sql);

      if ($error) return (object) [
        'status' => 403,
        'error' => $error,
        'data' => [],
      ];

      return (object) [
        'status' => 200,
        'error' => null,
        'data' => $sql->fetchAll(PDO::FETCH_CLASS),
      ];
    } catch (PDOException $ex) {
      return (object) [
        'status' => 500,
        'error' => $ex,
        'data' => [],
      ];
    }
  }

  static function CheckSQL($sql)
  {
    return $sql->errorCode() == '00000' ? null : $sql->errorInfo()[2];
  }
}
