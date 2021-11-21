<main>

    <h2 class="mt-3">Excluir aula</h2>

    <form method="post">

        <div class="form-group" >
            <p>Você deseja realmente excluir a aula de <strong><?=$obClass->nomeaula?></strong>?</p>
        </div>

       
        <div class="form-group">
        <a href="main.php">
            <button type="button" class="btn btn-primary">Cancelar</button>
        </a>

            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>

    </form>

</main>