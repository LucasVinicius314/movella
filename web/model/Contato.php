<?php

class Contato
{
  public static function Create($nome, $email, $assunto, $mensagem)
  {
    try {
      $conexao = new PDO(SERVER, UID, PASSWORD);

      $sql = $conexao->prepare("
      insert into tbl_contato (
        nome,
        email,
        assunto,
        mensagem
      )
      values (?, ?, ?, ?)
      ");

      $sql->execute([
        $nome,
        $email,
        $assunto,
        $mensagem
      ]);

      $error = Contato::CheckSQL($sql);

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
  }

  public static function Update($id)
  {
  }

  public static function Delete($id)
  {
  }

  public static function All()
  {
  }

  public static function Paginacao($categoria, $pagina, $quantidade)
  {
  }

  static function CheckSQL($sql)
  {
    return $sql->errorCode() == '00000' ? null : $sql->errorInfo()[2];
  }
}
