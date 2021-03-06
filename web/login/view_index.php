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
    <div style="height: 100vh; backdrop-filter: brightness(50%); background-image: url(../img/cover.jpg); background-size: cover">
      <div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center" style="backdrop-filter: brightness(50%)">
        <h1 class="text-white">Entrar</h1>
        <form method="post" action="./?action=Login">
          <div class="card my-4 text-left">
            <div class="card-body">
              <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email">
              </div>
              <div class="form-group">
                <label for="senha">Senha</label>
                <input class="form-control" type="password" name="senha" id="senha">
              </div>
            </div>
          </div>
          <input class="btn btn-lg btn-primary bg-primary" type="submit" value="Entrar">
        </form>
      </div>
    </div>
  </main>

  <?php include '../inc/footer.php'; ?>

</body>

</html>