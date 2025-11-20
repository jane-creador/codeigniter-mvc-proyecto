<?= $this->include('header'); ?>

<h1 class="mb-3">Usuarios</h1>

<form method="post" action="/user/add" class="mb-3">
  <div class="row g-2">
    <div class="col"><input class="form-control" name="name"  placeholder="Nombre" required></div>
    <div class="col"><input class="form-control" name="login" placeholder="Login" required></div>
    <div class="col"><input class="form-control" name="password" placeholder="Password (simple)"></div>
    <div class="col-auto"><button class="btn btn-primary">Crear</button></div>
  </div>
</form>

<table class="table table-bordered">
  <tr><th>ID</th><th>Nombre</th><th>Login</th><th>Acciones</th></tr>
  <?php foreach(($users ?? []) as $u): ?>
    <tr>
      <td><?= $u['id'] ?></td>
      <td><?= esc($u['name']) ?></td>
      <td><?= esc($u['login']) ?></td>
      <td>
        <a class="btn btn-sm btn-outline-secondary" href="/user/edit/<?= $u['id'] ?>">Editar</a>
        <a class="btn btn-sm btn-outline-danger" href="/user/delete/<?= $u['id'] ?>" onclick="return confirm('¿Eliminar?')">Borrar</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<?= $this->include('footer'); ?>
