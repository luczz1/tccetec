<?php
include('../config.php');
if (isset($_POST['acao'])) { //se o formulário for enviado
    $nome = $_POST['nome']; //a variável nome passa a ser o nome que o usuário escreveu
    $senha = $_POST['senha']; //a variável senha passa a ser a senha que o usuário escreveu
    $cripto = password_hash($senha, PASSWORD_DEFAULT); //criptografa a senha
    $senhaConfirma  = $_POST['senhaConfirma'];

    if ($senha == $senhaConfirma) {
        $sql = $pdo->prepare("INSERT INTO registros VALUES (null, ?, ?)"); // prepara um statement para execução e retorna um objeto statement.
        $sql->execute([$nome, $cripto]); // executa um objeto statement
        echo "<script>alert('Conta criada! Você já pode logar.');";
        echo "javascript:window.location='login.php';</script>";
    } else {
        echo "<script>alert('As senhas não conferem.');";
        echo "javascript:window.location='register.php';</script>";
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
                <h3 class="card-title text-center mb-4  fs-3">Cadastre-se</h3>
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inputnome" placeholder="Digite seu nome" name="nome" required>
                            <label for="inputnome">Nome de usuário</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="inputsenha" placeholder="Digite sua senha" name="senha" required>
                            <label for="inputsenha">Senha</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="inputsenha" placeholder="Confirme sua senha" name="senhaConfirma" required>
                            <label for="inputsenha">Confirme a senha</label>
                        </div>

                        <div class="checkbox mb-3 mt-3">
                            <label>
                                <input type="checkbox" required> Concordo com os termos de uso.
                            </label>
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