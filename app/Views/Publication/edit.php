<?= $this->include('header'); ?>

<h1 class="mb-3">Editar publicación</h1>

<form method="post" action="/publication/edit/<?= $post['id'] ?>">
  <textarea name="content" class="form-control mb-2" required style="height:120px;"><?= esc($post['content']) ?></textarea>
  <button class="btn btn-primary">Guardar</button>
  <a class="btn btn-link" href="/publication">Cancelar</a>
</form>

<?= $this->include('footer'); ?>
