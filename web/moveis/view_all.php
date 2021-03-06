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

  <main class="mb-4">
    <div style="height: 300px; backdrop-filter: brightness(50%); background-image: url(../img/cover.jpg); background-size: cover">
      <div class="w-100 h-100 d-flex justify-content-center align-items-center text-center" style="backdrop-filter: brightness(50%)">
        <h1 class="text-white">Móveis</h1>
      </div>
    </div>
    <div class="container mt-4">

      <div class="modal" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Móvel</h5>
              <button type="button" class="close modal-fechar" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Alugue este móvel.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary bg-primary modal-alugar">Alugar</button>
              <button type="button" class="btn btn-secondary bg-secondary modal-fechar" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>

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
            <div class="tab-pane fade show active" id="v-pills-base" role="tabpanel" aria-labelledby="v-pills-base-tab">
              <nav aria-label="Paginacao">
                <ul id="pagination" class="pagination">
                  <li class="page-item" data-role="previous"><a class="page-link">Previous</a></li>
                  <li class="page-item" data-role="page" data-page="1"><a class="page-link">1</a></li>
                  <li class="page-item" data-role="page" data-page="2"><a class="page-link">2</a></li>
                  <li class="page-item" data-role="page" data-page="3"><a class="page-link">3</a></li>
                  <li class="page-item" data-role="next"><a class="page-link">Next</a></li>
                </ul>
              </nav>
              <div class="row px-1"></div>
            </div>
          </div>
        </div>
      </div>

    </div>
    </div>

    </div>
  </main>

  <script>
    $(document).ready(() => {

      let categoria = 'Cadeiras'
      let pagina = 1
      let quantidade = 4

      function update() {
        categoria = $(this).text().trim() || categoria
        pagina = pagina <= 1 ? 1 : pagina
        $.post('./?action=_Paginacao', {
            categoria,
            pagina,
            quantidade,
          }, {
            headers: {
              'Content-Type': 'application/json; charset=utf-8',
            },
          })
          .then(data => JSON.parse(data))
          .then(data => {
            console.log(data)
            return data
          })
          .then(data => {
            $('#v-pills-base > div').html('')
            data.data.forEach(v => $('#v-pills-base > div').append(`
              <div class="col-6 col-md-4 p-1 movel" data-nome="${v.nome}" data-descricao="${v.descricao}" data-imagem="${v.imagem}">
                <div class="card h-100">
                  <img class="card-img-top" style="height: 150px; object-fit: contain" src="../img/${v.imagem}" alt="${v.nome}">
                  <div class="card-body">
                    ${v.nome}
                    <br>
                    <small>${v.cidade}</small>
                    <br>
                    <small>Por: ${v.usuario}</small>
                  </div>
                  <div class="card-footer">
                    R$ ${v.valorMes.replace('.', ',')}/mês
                  </div>
                </div>
              </div>
          `))
            $('.movel').on('click', function () {
              $('.modal').show()
              $('.modal-body').html(`
                <div class="row">
                  <div class="col-6">
                    <h2>${$(this).attr('data-nome')}</h2>
                    <p>${$(this).attr('data-descricao')}</p>
                  </div>
                  <div class="col-6">
                    <img class="w-100 h-100" src="../img/${$(this).attr('data-imagem')}" />
                  </div>
                </div>
              `)
            })
          })
      }

      $('#v-pills-tab > a').on('click', update)

      $('#pagination > li[data-role="previous"]').on('click', function() {
        pagina--
        update()
      })

      $('#pagination > li[data-role="page"]').on('click', function() {
        pagina = $(this).attr('data-page')
        update()
      })

      $('#pagination > li[data-role="next"]').on('click', function() {
        pagina++
        update()
      })

      update()

      $('.modal-fechar, .modal-fechar').on('click', () => $('.modal').hide())

    })
  </script>

  <?php include '../inc/footer.php'; ?>

</body>

</html>