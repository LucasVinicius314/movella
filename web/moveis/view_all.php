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

  <main class="mb-4">
    <div style="height: 300px; backdrop-filter: brightness(50%); background-image: url(../img/cover.jpg); background-size: cover">
      <div class="w-100 h-100 d-flex justify-content-center align-items-center text-center" style="backdrop-filter: brightness(50%)">
        <h1 class="text-white">Móveis</h1>
      </div>
    </div>
    <div class="container mt-4">

      <!-- <nav class="d-flex justify-content-center wow fadeIn">
        <ul class="pagination pg-blue">
          <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item active">
            <a class="page-link" href="#">hoje
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">amanhã</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">próxima terça</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav> -->

      <div class="row">
        <div class="col-12 col-md-3">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <?php foreach ($categorias as $key => $item) { ?>

              <a class="nav-link <?= $key == 0 ? 'active' : '' ?>" id="v-pills-<?= $key ?>-tab" data-toggle="pill" href="#v-pills-<?= $key ?>" role="tab" aria-controls="v-pills-<?= $key ?>" aria-selected="<?= $key == 0 ? 'true' : 'false' ?>">
                <?= $item->nome ?>
              </a>

            <?php } ?>

          </div>
        </div>
        <div class="col-12 col-md-9">
          <div class="tab-content" id="v-pills-tabContent">

            <?php foreach ($categorias as $key1 => $item1) { ?>

              <div class="tab-pane fade show <?= $key1 == 0 ? 'active' : '' ?>" id="v-pills-<?= $key1 ?>" role="tabpanel" aria-labelledby="v-pills-<?= $key1 ?>-tab">
                <div class="row px-1">

                  <?php foreach ($moveis as $key2 => $item2) { 
                    if ($item2->categoria != $item1->nome) continue;
                  ?>

                    <div class="col-6 col-md-4 p-1">
                      <div class="card h-100">
                        <img class="card-img-top" style="height: 150px; object-fit: contain" src="../img/cover.jpg" alt="Card image cap">
                        <div class="card-body">
                          <?= $item2->nome ?>
                        </div>
                        <div class="card-footer">
                          R$ <?= preg_replace('/\./', ',', $item2->valorMes) ?>/mês
                        </div>
                      </div>
                    </div>

                  <?php } ?>

                </div>
              </div>

            <?php } ?>

          </div>
        </div>
      </div>

    </div>
    </div>

    </div>
  </main>

  <?php include '../inc/footer.php'; ?>

</body>

</html>