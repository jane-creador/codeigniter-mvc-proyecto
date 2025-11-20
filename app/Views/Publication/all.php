<!doctype html><meta charset="utf-8">
<h1>Publications </h1>

<form method="post" action="<?= site_url('publication/add') ?>">
  <?= csrf_field() ?>
  <!-- tus inputs aquí -->

  <input type="number" name="user_id" placeholder="user_id (opcional)">
  <input name="content" placeholder="Escribe algo..." required>
  <button>Publicar</button>
</form>

<ul>
<?php foreach (($posts ?? []) as $p): ?>
  <li><?= esc($p['content']) ?></li>
<?php endforeach; ?>
</ul>
