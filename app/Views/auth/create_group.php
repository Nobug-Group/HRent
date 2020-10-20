<!--
    Carrega Template Base
    Este conteudo é carregado a partir de templates/main.php
-->
<?= $this->extend('templates/main') ?>

<!-- Este conteudo vai para head templates/head.php -->
<?= $this->section('templates/styles_adicionais') ?>
    <!-- Insira aqui css adicionais para sua view -->
<?= $this->endSection() ?>


<!--
    Titulo da pagina
    Este conteudo vai para main.php
-->
<?= $this->section('templates/maintitle') ?>
    <!-- Este conteudo é exibido na barra path  -->
    <h1 class="m-0 text-dark">Editar Grupo</h1>
<?= $this->endSection() ?>

<!--
    Caminho da Pagina
    Este conteudo vai para main.php
-->
<?= $this->section('templates/fullpath') ?>
    <li class="breadcrumb-item"><a href="/Main">Inicio</a></li>
    <li class="breadcrumb-item active">Editar Grupo</li>
<?= $this->endSection() ?>

<!--
    Conteudo Principal
    Este conteudo vai para main.php
-->
<?= $this->section('templates/conteudo_principal') ?>
<div class="row">
    <div class="col-12">
        <div id="infoMessage"><?php echo $message;?></div>
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Editar Grupo</h3>
              </div>
              <!-- /.card-header -->
                <?php echo form_open("auth/create_group");?>
                    <div class="card-body">
                        <div class="form-group">
                            <?php echo form_label(lang('Auth.edit_group_name_label'), 'group_name');?> <br />
                            <?php $group_name['class']='form-control'; ?>
                            <?php echo form_input($group_name);?>
                        </div>

                        <div class="form-group">
                            <?php echo form_label(lang('Auth.edit_group_desc_label'), 'description');?> <br />
                            <?php $description['class']='form-control'; ?>
                            <?php echo form_input($description);?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php echo form_submit('Enviar', lang('Auth.edit_group_submit_btn'),"class='btn btn-primary'");?></p>
                    </div>
                <?php echo form_close();?>
            </div>
        <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
    <!-- /.col-12 -->
</div>
<!-- /.row -->

<?= $this->endSection() ?>

<!-- 
    Este conteudo vai para scrips templates/scrips.php
-->
<?= $this->section('templates/scripts_adicionais') ?>
    <script>
        $(function () {
            $('#nav_menu_main').addClass('menu-open')
            $('#nav_geruser').addClass('active')
            $('#nav_main_button').addClass('active')
        });
    </script>
<?= $this->endSection() ?>