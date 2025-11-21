<?= $this->include('header'); ?>

<?php if ($message = session()->getFlashdata('message')): ?>
  <div class="alert alert-info"><?= esc($message) ?></div>
<?php endif; ?>

<h1 class="mb-3">Subir imagen</h1>
<form method="post" enctype="multipart/form-data" action="<?= base_url('images/upload') ?>">
<?= csrf_field() ?>
  <div class="mb-3">
    <label for="file" class="form-label">Selecciona un archivo</label>
    <input type="file" name="file" id="file" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Subir</button>
</form>

<?= $this->include('footer'); ?>