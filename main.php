<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>ETEC Classrooms</title>
</head>

<body>
    <div class="jumbotron jumbotron-fluid ">
        <div class="container">
            <h1 class="display-4 text-center">ETEC Classrooms</h1>
            <p class="lead text-center">Escolha uma aula para fazer ou crie sua própria aula.</p>
            
            


            <?php

            require __DIR__ . '/vendor/autoload.php';

            use \App\Entity\Classes;

            //filtrar buscas por matéria
            $search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
            $conditions = [
                strlen($search) ?'nomemateria LIKE "%'.str_replace(' ', '%',$search).'%"' : null
            ];

            $where = implode(' AND ', $conditions);
            //
            
            $aulas = Classes::getClasses($where); 
            include('config.php');
            
            ?>
            

            <?php

           


            if ($_SESSION['login'] != true) {
                header('location: index.php'); //se o usuário não estiver logado ele volta para página de login.
                die();
            }

            if (isset($_GET['logout'])) {
                session_destroy(); //se o usuário clicar der logout a sessão é encerrada e ele volta para página de login
                header('location: index.php');
                die();
            }


            if ($_SESSION['nome'] == 'Admin') {
                echo '<span class="text-muted">Você está logado como um administrador do site.</span>'; //mensagem que mostra caso usuário seja um administrador
            }


            include __DIR__ . '/includes/list.php';


            ?>


            
        </div>
    </div>
    <div class="row d-flex justify-content-end mt-3">
                <div class="col-md-3">
                    <?php echo '<h5>Logado como ' . ucfirst($_SESSION['nome']) . '.</h5>'; ?>
                    <!--ucfirst deixa a primeira letra maiuscula -->
                    <h2><a href="?logout"><button class="btn btn-danger border" onclick="return confirm('Tem certeza que quer deslogar?')">Logout</button></a></h2>
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