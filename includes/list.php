<?php

//mostrar os dados de todos os campos na tabela
$results = '';
foreach ($aulas as $aula) { //foreach = para cada
  $results .= '<tr>
    <td>' . $aula->nomeaula . '</td>
    <td>' . $aula->nomeprof . '</td>
    <td>' . $aula->nomemateria . '</td>
    <td>' . $aula->descricao . '</td>

    <td><a href="view.php?id=' . $aula->id . '"><button type="button" class="btn btn-primary">
   Visualizar
    </button>
    </a>
    </td>';
    
    if ($_SESSION['nome'] == 'Admin') { //se for um administrador terá essas funções diferentes
      $results .= '<td>
        <a href="delete.php?id=' . $aula->id . '"><button type="button" class="btn btn-danger">
      Excluir
       </button>
       </a>
        </td>';
     
    }
   '</tr>';
}

$results = strlen($results) ? $results : '<tr> <td colspan="4" class="text-center">Nenhuma aula registrada.</td></tr>';



?>



<main >
  <section>
        <form method="get">
            <div class="row my-3 mt-5 ">
                <div class="col">
                    <label>Buscar por matéria</label>
                    <input type="text" name="search" class="form-control " value="<?= $search ?>">
                </div>

                <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>
    </section>
  <section>

    <table class="table table-borderless table-hover mt-5 text-center bg-light">
      <thead>
        <tr>
          <th scope="col">Nome da aula</th>
          <th scope="col">Professor(a)</th>
          <th scope="col">Matéria</th>
          <th scope="col">Descrição</th>
          <th scope="col">Ações</th>
          <?php
          if ($_SESSION['nome'] == 'Admin') {
            echo ' <th scope="col">Ações de admin</th>';
          }
          ?>
        </tr>
      </thead>
      <tbody>
        <?= $results ?>
      </tbody>
    </table>
  </section>
  
  <a href="insert.php"><button class="btn btn-success mt-3 ">Crie sua própria aula!</button></a>
  <hr class="my-4">
  <div class="bg-secondary.bg-gradient">
  <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 ">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-4 fw-bold lh-1">Por onde você quer começar?</h1>
        <p class="lead">Escolha uma das aulas da lista acima e comece a estudar! Sabemos como tudo ficou mais díficil nesse período de pandemia e por isso essas pessoas estão reunidas aqui para aprender juntos!</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden ">
          <img class="rounded-lg-3 border shadow-lg"  src="http://portal.utfpr.edu.br/noticias/geral/utfpr-abre-selecao-para-mais-de-590-vagas-a-docentes-e-estudantes-de-licenciatura/pessoa-acessa-o-notebook/@@images/image.jpeg" alt="" width="720">
      </div>
    </div>
  </div>

  <main class="px-3">
  <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 ">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
    <h1 class="display-4 fw-bold lh-1">Saiba mais.</h1>
    <p class="lead ">Esse é um projeto de TCC (trabalho de conclusão de curso) dos alunos Lucas Lima e Vinicius Varonelli, terceiro ano do ETIM de desenvolvimento de sistemas. Com a orientação dos professores foi possível criar um site simples para demonstrar a ideia de ambos.</p>
    
  </div>
    </div>
  </div>
  </main>

  <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 ">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-4 fw-bold lh-1">O ensino a distância.</h1>
        <p class="lead">Educação a distância é uma modalidade de educação mediada por tecnologias em que discentes e docentes estão separados espacial e/ou temporalmente, ou seja, não estão fisicamente presentes em um ambiente presencial de ensino-aprendizagem.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden ">
          <img class="rounded-lg-3 border shadow-lg"  src="https://blog.sesisenai.org.br/wp-content/uploads/2021/02/o-que-e-curso-ead-e-como-funciona.jpg" alt="" width="720">
      </div>
    </div>
  </div>
  </div>


  

  

</main>