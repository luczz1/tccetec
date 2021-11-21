<?php

include('../config.php');
if (isset($_POST['acao'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $sql = $pdo->prepare("SELECT * FROM registros WHERE nome = ?");
    $sql->execute([$nome]);

    if ($sql->rowCount() == 1) {
        $info = $sql->fetch(); // fetch - busca a próxima linha de um conjunto de resultados
        if (password_verify($senha, $info['senha'])) {
            $_SESSION['login'] = true; //verifica se a sessão de logado é verdadeira.
            $_SESSION['id'] = $info['id']; //verifica se o id da sessão é igual a algum id registrado.
            $_SESSION['nome'] = $info['nome']; //verifica se o nome da sessão é igual a algum nome registrado.
            header("Location: ../main.php"); //redireciona para a pagina main.
            die();
        } else {
            echo "<script>alert('Usuário ou senha incorretos')</script>";
        }
    } else {
        echo "<script>alert('Usuário não existe')</script>";
    }
}
?>

<?php
include('../includes/header.php');
?>


<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h3 class="card-title text-center mb-4 fs-3">Faça login</h3>
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inputnome" placeholder="Digite seu nome" name="nome" required>
                            <label for="inputnome">Nome de usuário</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="inputsenha" placeholder="Digite sua senha" name="senha" required>
                            <label for="inputsenha">Senha</label>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="acao">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('../includes/footer.php');
?>