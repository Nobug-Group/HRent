<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="pt-br">
<?= $this->include('templates/head') ?>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
  
  <?= $this->include('templates/navbars') ?>
  
  <!-- Content Wrapper. Contains page content -->
  <?= $this->renderSection('templates/content') ?>
  <!-- /.content-wrapper -->
  
  <?= $this->include('templates/sidebar') ?>
  <?= $this->include('templates/footer') ?>

</div>
  
  <?= $this->include('templates/scripts') ?>

</body>
</html>
