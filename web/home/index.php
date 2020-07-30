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

<?php

$sofas = [
  (object) [
    'img' => 'sofa1.webp',
    'description' => 'Sofá 1',
    'price' => 'R$ 30,00/mês',
  ],
  (object) [
    'img' => 'sofa2.jpg',
    'description' => 'Sofá 2',
    'price' => 'R$ 35,00/mês',
  ],
  (object) [
    'img' => 'sofa3.jpg',
    'description' => 'Sofá 3',
    'price' => 'R$ 28,00/mês',
  ],
  (object) [
    'img' => 'sofa4.webp',
    'description' => 'Sofá 4',
    'price' => 'R$ 39,00/mês',
  ],
];
$mesas = [
  (object) [
    'img' => 'mesa1.webp',
    'description' => 'Mesa 1',
    'price' => 'R$ 30,00/mês',
  ],
  (object) [
    'img' => 'mesa2.jpg',
    'description' => 'Mesa 2',
    'price' => 'R$ 30,00/mês',
  ],
  (object) [
    'img' => 'mesa3.jpg',
    'description' => 'Mesa 3',
    'price' => 'R$ 32,00/mês',
  ],
  (object) [
    'img' => 'mesa4.jpg',
    'description' => 'Mesa 4',
    'price' => 'R$ 24,00/mês',
  ],
  (object) [
    'img' => 'mesa5.jpg',
    'description' => 'Mesa 5',
    'price' => 'R$ 26,00/mês',
  ],
];
$cadeiras = [
  (object) [
    'img' => 'cadeira1.jpg',
    'description' => 'Cadeira 1',
    'price' => 'R$ 25,00/mês',
  ],
  (object) [
    'img' => 'cadeira2.jpg',
    'description' => 'Cadeira 2',
    'price' => 'R$ 22,00/mês',
  ],
  (object) [
    'img' => 'cadeira3.jpg',
    'description' => 'Cadeira 3',
    'price' => 'R$ 28,00/mês',
  ],
  (object) [
    'img' => 'cadeira4.jpg',
    'description' => 'Cadeira 4',
    'price' => 'R$ 19,00/mês',
  ],
];
$escrivaninhas = [
  (object) [
    'img' => 'escrivaninha1.jpg',
    'description' => 'Escrivaninha 1',
    'price' => 'R$ 37,00/mês',
  ],
  (object) [
    'img' => 'escrivaninha2.webp',
    'description' => 'Escrivaninha 2',
    'price' => 'R$ 33,00/mês',
  ],
];

?>



<body>

  <?php include '../inc/header.php'; ?>

  <main>
    <div class="" style="height: 300px; backdrop-filter: brightness(50%); background-image: url(../img/cover.jpg); background-size: cover">
      <div class="w-100 h-100 d-flex justify-content-center align-items-center text-center" style="backdrop-filter: brightness(50%)">
        <h1 class="position-relative text-white">Móveis</h1>
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
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Sofás</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Mesas</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Cadeiras</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Escrivaninhas</a>
          </div>
        </div>
        <div class="col-12 col-md-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="row px-1">

                <?php foreach ($sofas as $item) { ?>

                  <div class="col-6 col-md-4 p-1">
                    <div class="card h-100">
                      <img class="card-img-top" style="height: 150px; object-fit: contain" src="../img/<?= $item->img ?>" alt="Card image cap">
                      <div class="card-body">
                        <?= $item->description ?>
                      </div>
                      <div class="card-footer">
                        <?= $item->price ?>
                      </div>
                    </div>
                  </div>

                <?php } ?>

              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              <div class="row px-1">

                <?php foreach ($mesas as $item) { ?>

                  <div class="col-6 col-md-4 p-1">
                    <div class="card h-100">
                      <img class="card-img-top" style="height: 150px; object-fit: contain" src="../img/<?= $item->img ?>" alt="Card image cap">
                      <div class="card-body">
                        <?= $item->description ?>
                      </div>
                      <div class="card-footer">
                        <?= $item->price ?>
                      </div>
                    </div>
                  </div>

                <?php } ?>

              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
              <div class="row px-1">

                <?php foreach ($cadeiras as $item) { ?>

                  <div class="col-6 col-md-4 p-1">
                    <div class="card h-100">
                      <img class="card-img-top" style="height: 150px; object-fit: contain" src="../img/<?= $item->img ?>" alt="Card image cap">
                      <div class="card-body">
                        <?= $item->description ?>
                      </div>
                      <div class="card-footer">
                        <?= $item->price ?>
                      </div>
                    </div>
                  </div>

                <?php } ?>

              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
              <div class="row px-1">

                <?php foreach ($escrivaninhas as $item) { ?>

                  <div class="col-6 col-md-4 p-1">
                    <div class="card h-100">
                      <img class="card-img-top" style="height: 150px; object-fit: contain" src="../img/<?= $item->img ?>" alt="Card image cap">
                      <div class="card-body">
                        <?= $item->description ?>
                      </div>
                      <div class="card-footer">
                        <?= $item->price ?>
                      </div>
                    </div>
                  </div>

                <?php } ?>

              </div>
            </div>
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