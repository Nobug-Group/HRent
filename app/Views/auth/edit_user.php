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
    <h1 class="m-0 text-dark">Editar Usuário</h1>
    
<?= $this->endSection() ?>

<!--
    Caminho da Pagina
    Este conteudo vai para main.php
-->
<?= $this->section('templates/fullpath') ?>
    <li class="breadcrumb-item"><a href="/Main">Inicio</a></li>
    <li class="breadcrumb-item active">Editar Usuário</li>
<?= $this->endSection() ?>

<!--
    Conteudo Principal
    Este conteudo vai para main.php
-->
<?= $this->section('templates/conteudo_principal') ?>
<div class="row">
    <div class="col-12">
        <!-- Insira aqui css adicionais para sua view -->
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Editar Usuário</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div id="infoMessage"><?php echo $message;?></div>
              <form role="form" method="POST" action="<?php uri_string()?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="first_name"><?php echo lang('Auth.edit_user_fname_label')?></label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter email" value="<?php echo $user->first_name;?>">
                  </div>
                  <div class="form-group">
                    <label for="last_name"><?php echo lang('Auth.edit_user_lname_label')?></label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="<?php echo lang('Auth.edit_user_lname_label')?>" value="<?php echo $user->last_name;?>">
                  </div>
                  <div class="form-group">
                    <label for="company"><?php echo lang('Auth.edit_user_company_label')?></label>
                    <input type="text" class="form-control" id="company" name="company" placeholder="<?php echo lang('Auth.edit_user_company_label')?>" value="<?php echo $user->company;?>">
                  </div>
                  <div class="form-group">
                    <label for="phone"><?php echo lang('Auth.edit_user_phone_label')?></label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo lang('Auth.edit_user_phone_label')?>" value="<?php echo $user->phone;?>">
                  </div>
                  <div class="form-group">
                    <label for="password"><?php echo lang('Auth.edit_user_password_label')?></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo lang('Auth.edit_user_password_label')?>">
                  </div>
                  <div class="form-group">
                    <label for="password_confirm"><?php echo lang('Auth.edit_user_password_confirm_label')?></label>
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="<?php echo lang('Auth.edit_user_password_confirm_label')?>">
                  </div>
                  
                  <?php if ($isadmin): ?>

                    <h3><?php echo lang('Auth.edit_user_groups_heading');?></h3>
                    <?php foreach ($groups as $group):?>
                        <label class="checkbox">
                        <?php
                            $gID = $group['id'];
                            $checked = null;
                            $item = null;
                            foreach($currentGroups as $grp) {
                                if ($gID == $grp->id) {
                                    $checked = ' checked="checked"';
                                break;
                                }
                            }
                        ?>
                        <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                        <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8');?>
                        </label>
                    <?php endforeach?>

                    <?php endif ?>
                    <?php echo form_hidden('id', $user->id);?>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
    <!-- Insira aqui scripts adicionais para sua view -->
<?= $this->endSection() ?>