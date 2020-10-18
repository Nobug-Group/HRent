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
    <h1 class="m-0 text-dark">Adicionar Usuário</h1>
<?= $this->endSection() ?>

<!--
    Caminho da Pagina
    Este conteudo vai para main.php
-->
<?= $this->section('templates/fullpath') ?>
    <li class="breadcrumb-item"><a href="/Main">Inicio</a></li>
    <li class="breadcrumb-item active">Adicionar Usuário</li>
<?= $this->endSection() ?>

<!--
    Conteudo Principal
    Este conteudo vai para main.php
-->
<?= $this->section('templates/conteudo_principal') ?>
<div id="infoMessage"><?php echo $message;?></div>
<div class="row">
    <div class="col-12">
    <form role="form" method="POST" action="/autentica/create_user">
        <div class="card-body">
            <div class="form-group">
                <label for="first_name"><?php echo lang('Auth.create_user_fname_label')?></label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="<?php echo lang('Auth.create_user_fname_label')?>" >
            </div>
            <div class="form-group">
                <label for="last_name"><?php echo lang('Auth.create_user_lname_label')?></label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="<?php echo lang('Auth.create_user_lname_label')?>" >
            </div>
            <div class="form-group">
                <?php
                if ($identity_column !== 'email'):?> 
                    <label for="email"><?php echo lang('Auth.create_user_identity_label')?></label>                  
                    <?php echo \Config\Services::validation()->getError('identity'); ?>
                    <input type="email" class="form-control" id="identity" name="identity" placeholder="<?php echo lang('Auth.create_user_identity_label')?>" >
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="company"><?php echo lang('Auth.create_user_company_label')?></label>                  
                <input type="text" class="form-control" id="company" name="company" placeholder="<?php echo lang('Auth.create_user_company_label')?>" >
            </div>
            <div class="form-group">
                <label for="email"><?php echo lang('Auth.create_user_email_label')?></label>                  
                <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo lang('Auth.create_user_email_label')?>" >
            </div>
            <div class="form-group">
                <label for="phone"><?php echo lang('Auth.create_user_phone_label')?></label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo lang('Auth.create_user_phone_label')?>">
            </div>
            <div class="form-group">
                <label for="password"><?php echo lang('Auth.create_user_password_label')?></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo lang('Auth.create_user_password_label')?>">
            </div>
            <div class="form-group">
                <label for="password_confirm"><?php echo lang('Auth.create_user_password_confirm_label')?></label>
                <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="<?php echo lang('Auth.create_user_password_confirm_label')?>">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    </div>
    <!-- /.col-12 -->
</div>
<!-- /.row -->

<?= $this->endSection() ?>

<!-- 
    Este conteudo vai para scrips templates/scrips.php
-->
<?= $this->section('templates/scripts_adicionais') ?>
    <!-- Insira aqui scripts adicionais para sua view -->
<?= $this->endSection() ?>