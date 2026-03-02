
<!-- IMPORTR PLANTILLA -->
<?= $this -> extend('plantillas/panel_base') ?>

<!-- RENER CSS CONTENIDO -->
 <?= $this -> section('css') ?>
    <!-- Daterange picker -->
   <link rel="stylesheet" href="<?= base_url(RECURSOS_PANEL_ADMIN_PLUGINS.'daterangepicker/daterangepicker.css')?>">
 <?= $this ->endSection() ?>
<!-- RENER CSS CONTENIDO -->

<!-- RENER CONTENIDO -->
 <?= $this -> section('content') ?>
<h4> Bienvenido al panel de administración</h4>
 <?= $this ->endSection() ?>
<!-- RENER CONTENIDO -->

<!-- RENER JS CONTENIDO -->
 <?= $this -> section('js') ?>
    <!-- Daterange picker -->
   <script src="<?=base_url(RECURSOS_PANEL_ADMIN_PLUGINS.'moment/moment.min.js')?>"></script>
   <script src="<?=base_url(RECURSOS_PANEL_ADMIN_PLUGINS.'daterangepicker/daterangepicker.js')?>"></script>
 <?= $this ->endSection() ?>
<!-- RENER CSS CONTENIDO -->

