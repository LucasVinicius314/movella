<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Movella</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link href="../css/mdb.min.css" rel="stylesheet">
  <link href="../css/custom.css" rel="stylesheet">
  <link href="../css/style.min.css" rel="stylesheet">
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <script type="text/javascript">
    new WOW().init();
  </script>
</head>

<body>

  <?php include '../inc/header.php'; ?>

  <?php
  if (isset($_SESSION['msg']) && $_SESSION['msg'] !== false) {
    $msg = $_SESSION['msg'];
    echo "<script>alert('$msg')</script>";
    unset($_SESSION['msg']);
  }
  ?>

  <main>
    <div style="height: 300px; backdrop-filter: brightness(50%); background-image: url(../img/cover.jpg); background-size: cover">
      <div class="w-100 h-100 d-flex justify-content-center align-items-center text-center" style="backdrop-filter: brightness(50%)">
        <h1 class="text-white">Contato</h1>
      </div>
    </div>
    <div class="container mt-4">
      <form action="?action=_contato" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nome">Nome*</label>
              <input class="form-control" type="text" name="nome" id="nome" maxlength="100" required>
            </div>
            <div class="form-group">
              <label for="email">E-mail*</label>
              <input class="form-control" type="email" name="email" id="email" maxlength="100" required>
            </div>
            <div class="form-group">
              <label for="assunto">Assunto*</label>
              <input class="form-control" type="text" name="assunto" id="assunto" maxlength="50" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group h-100">
              <label for="mensagem">Mensagem*</label>
              <textarea class="form-control" style="height: 210px; min-height: 38px" name="mensagem" id="mensagem" maxlength="400" required></textarea>
            </div>
          </div>
          <div class="col-6"></div>
          <div class="col-6 d-flex justify-content-end">
            <input class="btn btn-primary bg-primary btn-lg" type="submit" value="Enviar">
          </div>
        </div>
      </form>
    </div>
  </main>

  <?php include '../inc/footer.php'; ?>

</body>

</html>