<?= $this->extend('templates/template') ?>
<?= $this->section('templates/content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?= $this->renderSection('templates/maintitle') ?>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?= $this->renderSection('templates/fullpath') ?>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <?= $this->renderSection('templates\conteudo_principal') ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
<?= $this->endSection() ?>