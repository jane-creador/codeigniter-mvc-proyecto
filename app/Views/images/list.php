<?= $this->include('header'); ?>

<h1 class="mb-3">Imágenes</h1>
<p class="mb-3"><?= anchor('images/upload', 'Subir nueva'); ?></p>

<?php if (! empty($files)): ?>
  <ul class="list-group">
    <?php foreach ($files as $file): ?>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <span><?= esc($file) ?></span>
        <?= anchor('images/delete/' . $file, 'Borrar'); ?>
      </li>
    <?php endforeach; ?>
  </ul>
<?php else: ?>
  <p>No hay imágenes</p>
<?php endif; ?>

<?= $this->include('footer'); ?>
