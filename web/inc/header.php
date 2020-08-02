<?php
$page = [];
preg_match('/(\w+)$/', getcwd(), $page);

define('PAGE', $page[0]);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary lighten-3">
  <span class="navbar-brand"><img src="../img/movellasmall.png" style="height: 80px; width: 80px" /></span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="basicExampleNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?= PAGE == 'home' ? 'active' : '' ?>">
        <a class="nav-link" href="../home">Móveis
          <?= PAGE == 'home' ? '<span class="sr-only">(current)</span>' : '' ?>
        </a>
      </li>
      <li class="nav-item <?= PAGE == 'about' ? 'active' : '' ?>">
        <a class="nav-link" href="../about">Sobre
          <?= PAGE == 'about' ? '<span class="sr-only">(current)</span>' : '' ?>
        </a>
      </li>
      <li class="nav-item <?= PAGE == 'contact' ? 'active' : '' ?>">
        <a class="nav-link" href="../contact">Contato
          <?= PAGE == 'contact' ? '<span class="sr-only">(current)</span>' : '' ?>
        </a>
      </li>
      <li class="nav-item <?= PAGE == 'login' ? 'active' : '' ?>">
        <a class="nav-link" href="../login">Entrar
          <?= PAGE == 'login' ? '<span class="sr-only">(current)</span>' : '' ?>
        </a>
      </li>
      <li class="nav-item <?= PAGE == 'register' ? 'active' : '' ?>">
        <a class="nav-link" href="../register">Criar Conta
          <?= PAGE == 'register' ? '<span class="sr-only">(current)</span>' : '' ?>
        </a>
      </li>
    </ul>
    <form class="form-inline">
      <div class="md-form my-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
      </div>
    </form>
  </div>
</nav>