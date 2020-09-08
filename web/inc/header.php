<?php
$page = [];
preg_match('/(\w+)$/', getcwd(), $page);

define('PAGE', $page[0]);

function greet() {

  $data = (int) date('H');

  if ($data < 6) return 'Boa noite,';
  if ($data < 12) return 'Bom dia,';
  if ($data < 18) return 'Boa tarde,';
  if ($data < 24) return 'Boa noite,';

}

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary lighten-3">
  <span class="navbar-brand"><img src="../img/movellasmall.png" style="height: 80px; width: 80px" /></span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="basicExampleNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?= PAGE == 'moveis' ? 'active' : '' ?>">
        <a class="nav-link" href="../moveis">Móveis
          <?= PAGE == 'moveis' ? '<span class="sr-only">(current)</span>' : '' ?>
        </a>
      </li>
      <li class="nav-item <?= PAGE == 'sobre' ? 'active' : '' ?>">
        <a class="nav-link" href="../sobre">Sobre
          <?= PAGE == 'sobre' ? '<span class="sr-only">(current)</span>' : '' ?>
        </a>
      </li>
      <li class="nav-item <?= PAGE == 'contato' ? 'active' : '' ?>">
        <a class="nav-link" href="../contato">Contato
          <?= PAGE == 'contato' ? '<span class="sr-only">(current)</span>' : '' ?>
        </a>
      </li>
      <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != false) { ?>
        <li class="nav-item">
          <a class="nav-link" href="../logout">Sair</a>
        </li>
      <?php } else { ?>
        <li class="nav-item <?= PAGE == 'login' ? 'active' : '' ?>">
          <a class="nav-link" href="../login">Entrar
            <?= PAGE == 'login' ? '<span class="sr-only">(current)</span>' : '' ?>
          </a>
        </li>
        <li class="nav-item <?= PAGE == 'signin' ? 'active' : '' ?>">
          <a class="nav-link" href="../signin">Criar Conta
            <?= PAGE == 'signin' ? '<span class="sr-only">(current)</span>' : '' ?>
          </a>
        </li>
      <?php } ?>
    </ul>

    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != false) {
      
      $foto = $_SESSION['usuario']->foto ?? '';
      $usuario = $_SESSION['usuario']->usuario ?? '';

      ?>
      <div class="d-flex flex-row justify-content-center align-items-center">
        <div class="m-2">
          <img src="../img/<?= $foto ?>" style="height: 50px; width: 50px; border-radius: 50px; object-fit: cover" alt="">
        </div>
        <div class="text-white">
          <h5>
            <?= greet() ?> <?= $_SESSION['usuario']->usuario ?>
          </h5>
        </div>
      </div>
    <?php } ?>

    <!-- <form class="form-inline">
      <div class="md-form my-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
      </div>
    </form> -->

  </div>
</nav>