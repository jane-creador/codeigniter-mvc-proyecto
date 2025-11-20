<?= $this->include('header'); ?>

<h1 class="mb-3">Editar usuario</h1>

<form method="post" action="<?= site_url('user/edit/'.$u['id']) ?>">
  <?= csrf_field() ?>

  <div class="mb-2">
    <input class="form-control" name="name"  value="<?= esc($u['name']) ?>" required>
  </div>
  <div class="mb-2">
    <input class="form-control" name="login" value="<?= esc($u['login']) ?>" required>
  </div>
  <div class="mb-2">
    <input class="form-control" name="password" placeholder="(opcional)">
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>
  <a class="btn btn-link" href="/user">Cancelar</a>
</form>

<?= $this->include('footer'); ?>
