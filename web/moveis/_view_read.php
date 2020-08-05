<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>besT houR</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/mdb.min.css" rel="stylesheet">
  <link href="../css/style.min.css" rel="stylesheet">
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <script type="text/javascript">
    new WOW().init();
  </script>
  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    .bh {
      background-color: #ab94dc;
    }

    .card-img-top {
      height: 50px;
      width: 50px;
      border-radius: 25px;
      margin-top: 4px;
      margin-left: 4px;
    }

    .card {
      margin-bottom: 10px;
    }

    .btn-marcar {
      position: fixed;
      top: 84vh;
      left: 60vw;
    }

    .pagination.pg-blue .page-item.active .page-link,
    .pagination.pg-blue .page-item.active .page-link:hover {
      background-color: #ab94dc;
    }
  </style>
</head>

<body class="grey lighten-3">

  <?php include '../inc/header.php'; ?>

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <div class="row">

        <div class="col-md-8 mb-4">

          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">marcar hora para quem?</span>
          </h4>

          <div class="card">

            <div class="card-body">

              <div class="md-form mb-3">
                <input type="text" id="nome" id="nome" class="form-control" placeholder="Nome da cliente" value="<?= $agendamento->nome ?>" disabled>
                <label for="nome" class="active">cliente</label>
              </div>

              <div class="md-form input-group pl-0 mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                </div>
                <input type="text" id="celular" id="celular" class="form-control py-0" placeholder="celular" aria-describedby="basic-addon1" value="<?= $agendamento->celular ?>" disabled>
              </div>

              <div class="col-lg-8 m-0 p-0 mb-4">

                <label for="hora">Horário</label>
                <div class="form-row">
                  <div class="col-6">
                    <input type="time" class="form-control" id="hora" name="hora" placeholder="" value="<?= date('H:i:s', strtotime($agendamento->horario)) ?>" disabled>
                  </div>
                  <div class="col-6">
                    <input type="date" class="form-control" id="data" name="data" placeholder="" value="<?= date('Y-m-d', strtotime($agendamento->horario)) ?>" disabled>
                  </div>
                </div>
                <div class="invalid-feedback">Escolha o dia e a hora</div>

              </div>

              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="horarioFlexivel" nome="horarioFlexivel" <?= $agendamento->horarioFlexivel == 1 ? 'checked' : '' ?> disabled>
                <label class="custom-control-label" for="horarioFlexivel">Horário flexível</label>
              </div>

            </div>

          </div>

          <h4 class="d-flex justify-content-between align-items-center my-3">
            <span class="text-muted">vai fazer o quê?</span>
          </h4>

          <div class="col-md-8 mb-2">

            <div class="row mb-0">
              <select class="custom-select d-block w-100" id="servico" disabled>
                <option value="">Serviço (Profissional)...</option>

                <?php foreach ($parceiroServicos as $parceiroServico) { ?>

                  <option <?= $agendamento->parceiroServicoId == $parceiroServico->id ? 'selected' : '' ?> value="<?= $parceiroServico->id ?>"><?= ucfirst($parceiroServico->servico) ?> (<?= $parceiroServico->parceiro ?>)</option>

                <?php } ?>

              </select>
            </div>

            <div class="row mt-0">
              <button class="btn bh btn-lg w-100 m-0" type="button" disabled>acrescentar</button>
            </div>

          </div>

        </div>

        <div class="col-md-4 mb-4">

          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">serviços escolhidos</span>
            <span class="badge badge-secondary badge-pill">1</span>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">

            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?= $agendamento->servicoNome ?></h6>
                <small class="text-muted"><?= $agendamento->nome ?></small>
              </div>
              <span class="text-muted">R$ <?= number_format($agendamento->valor, 0) ?></span>
            </li>

            <!-- <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Sobrancelha</h6>
                <small class="text-muted">Suzana</small>
              </div>
              <span class="text-muted">R$ 80</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Desconto</h6>
                <small>DIA DAS MÃES</small>
              </div>
              <span class="text-success">R$ -5</span>
            </li> -->
            <li class="list-group-item d-flex justify-content-between">
              <span>Total</span>
              <strong>R$ <?= number_format($agendamento->valor, 0) ?></strong>
            </li>
          </ul>
          <!-- Cart -->

          <!-- Promo code -->
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Código promocional" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn bh btn-md waves-effect m-0" type="button">APLICAR</button>
              </div>
            </div>
          </form>
          <!-- Promo code -->

          <div class="row mx-0">
            <a class="w-100 black-text" href="./">
              <button class="btn bh btn-lg btn-block" type="button">voltar</button>
            </a>
          </div>

        </div>

      </div>

    </div>
  </main>
  <!--Main layout-->

  <?php include '../inc/footer.php'; ?>

</body>

</html>