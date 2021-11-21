<a href="main.php"><button class="btn btn-primary mt-3">Voltar</button></a>

<form method="post" class="border shadow-lg p-3 mt-3">

  <h3 class="mt-3"><?= TITLE ?></h3>

  <div class="form-group mt-3">
    <label>Nome da aula</label>
    <input type="text" class="form-control" name="nomeaula" required placeholder="Digite um nome para a sua aula.">
  </div>

  <div class="form-group mt-3">
    <label>Nome do(a) professor(a)</label>
    <input type="text" class="form-control" name="nomeprof"  required placeholder="Digite o nome do(a) professor(a) aplicante da aula.">
  </div>

  <div class="form-group mt-3">
    <label>Nome da matéria</label>
    <input type="text" class="form-control" name="nomemateria" required placeholder="Essa aula é de qual matéria?">
  </div>

  <div class="form-group mt-3">
    <label>Descrição</label>
    <input type="text" class="form-control" name="descricao" required placeholder="Descreva sua aula de forma simples, exemplo: Começando do zero.">
  </div>

  <div class="form-group">
    <label>Conteúdo</label>
    <textarea class="form-control" name="conteudo" rows="15" required placeholder="Faça uma breve explicação do conteúdo presente na sua aula."></textarea>
    
    <div class="input-group-prepend mt-3">
    <label>Link do youtube (escreva o que vem logo após o <b>watch?v=</b>)</label>
    <p>Exemplo: <b>youtube.com/watch?v=Jn9hISk0JaI</b> você pega apenas o <b>Jn9hISk0JaI</b> e coloque ali.</p>
    <span class="input-group-text" id="basic-addon3">https://youtube.com/embed/<input type="text" name="contimage" placeholder="link da vídeo-aula" required></span>
  </div>

  </div>


  <button type="submit" class="btn btn-success mt-3">Enviar</button>

</form>