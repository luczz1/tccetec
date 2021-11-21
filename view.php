
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>ETEC Classrooms</title>
  </head>
  <body>
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">ETEC Classrooms.</h1>
    <p class="lead">Você está assistindo a uma aula. Bons estudos!</p>
    <hr class="my-4">

<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Classes;

//validação do id
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?Classus=error');
    exit;
}

//consultar a aula
$obClass = Classes::getClasse($_GET['id']);

//validar a aula
if (!$obClass instanceof Classes) {
    header('location: main.php');
    exit;
}

//validar o post
if (isset($_POST['nomeaula'], $_POST['nomeprof'], $_POST['nomemateria'], $_POST['descricao'], $_POST['conteudo'], $_POST['contimage'])) {
    $ob->nomeaula = $_POST['nomeaula'];
    $obClass->nomeprof = $_POST['nomeprof'];
    $obClass->nomemateria = $_POST['nomemateria'];
    $obClass->descricao = $_POST['descricao'];
    $obClass->conteudo = $_POST['conteudo'];
    $obClass->contimage = $_POST['contimage'];
    //se todos os dados forem inseridos corretamente ele irá mostrar na página.

    header('Location: main.php');
    exit;
}



?>


<div class="card text-center mt-5 mx-auto w-50">
    <div class="card-body">
        <h5 class="card-title"><?= $obClass->nomeaula ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Professor(a): <?= $obClass->nomeprof ?></h6>
        <p class="card-text"><?= $obClass->conteudo ?></p>
      
        <iframe width="550" height="415" src="https://youtube.com/embed/<?= $obClass->contimage ?>">
        </iframe> <br>

        <a href="main.php"> <button class="btn btn-primary mt-3">Voltar</button></a>
    </div>
</div>

</div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>



