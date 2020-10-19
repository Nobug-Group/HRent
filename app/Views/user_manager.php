<?= $this->extend('templates/main') ?>


<?= $this->section('templates/styles_adicionais') ?>
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<?= $this->endSection() ?>


<!--Titulo da pagina -->
<?= $this->section('templates/maintitle') ?>
    <h1 class="m-0 text-dark">Gerenciamento de Usuários</h1>
<?= $this->endSection() ?>

<!--Caminho da Pagina -->
<?= $this->section('templates/fullpath') ?>
    <li class="breadcrumb-item"><a href="/Main">Inicio</a></li>
    <li class="breadcrumb-item active">Gerenciamento de Usuários</li>
<?= $this->endSection() ?>

<!--Conteudo Principal -->
<?= $this->section('templates/conteudo_principal') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="col">
                    <h3 class="card-title">Lista de Usuários</h3>
                </div>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                       <a href="/Main/create_user" data-toggle="tooltip" data-placement="bottom" title="Adicionar novo usuário ao Sistema"><i class="fas fa-user-plus fa-2x"></i></a>
                    </li>
                </ul>
                    
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="user_list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><?php echo lang('Auth.index_fname_th');?></th>
                            <th><?php echo lang('Auth.index_lname_th');?></th>
                            <th><?php echo lang('Auth.index_email_th');?></th>
                            <th class="text-center"><?php echo lang('Auth.index_groups_th');?></th>
                            <th class="text-center"><?php echo lang('Auth.index_status_th');?></th>
                            <th class="text-center"><?php echo lang('Auth.index_action_th');?></th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user):?>
                            <tr>
                                <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                                <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                                <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                                <td class="text-center align-middle"> 
                                    <?php foreach ($user->groups as $group):?>
                                        <?php 
                                            echo anchor('Autentica/edit_group/' . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'),array('data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Editar este grupo')); 
                                        ?><br />
                                    <?php endforeach?>
                                </td>
                                <td class="text-center align-middle">
                                    
                                    <?php 
                                        echo '<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-active-user" data-id="'.$user->id.'" data-ident="'.$user->username.'"><i class="fas fa-times-circle fa-lg"></i> </button>';
                                        echo ($user->active) ? anchor('Autentica/deactivate/' . $user->id, ' ', array('class' => 'fas fa-check fa-lg','style'=>'color:green', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Desativar este usuário')):
                                        anchor("Autentica/activate/". $user->id, ' ', array('class' => 'fas fa-times-circle fa-lg',  'style'=>'color:Tomato', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Ativar este usuário'));
                                    ?>
                                </td>
                                <td class="text-center align-middle">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <?php echo anchor('Autentica/edit_user/' .  $user->id,' ',array('class' => 'fas fa-user-edit fa-lg ', 'style'=>'color:green','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Editar este usuário')) ; ?>
                                        </li>
                                        <li class="nav-item">
                                            <?php echo anchor('#' .  $user->id,' ',array('class' => 'fas fa-user-times fa-lg', 'style'=>'color:tomato','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Excluir este usuário')) ; ?>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col-12 -->
</div>
<!-- /.row -->
<div class="modal fade" id="modal-active-user" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Desabilita Usuário</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <h1><?php echo lang('Auth.deactivate_heading');?></h1>
                
                <p><?php echo sprintf(lang('Auth.deactivate_subheading'), $user->username);?></p>

                    <?php //echo form_open('/Autentica/deactivate/' . $user->id);?>
                    <form id="form-modal" action="">
                    <p>
                        <?php echo form_label(lang('Auth.deactivate_confirm_y_label'), 'confirm');?>
                        <input type="radio" name="confirm" value="yes" checked="checked" />
                        <?php echo form_label(lang('Auth.deactivate_confirm_n_label'), 'confirm');?>
                        <input type="radio" name="confirm" value="no" />
                    </p>

                <?php echo form_hidden('Name','$user->id','id', $user->id); ?>

                <p><?php echo form_submit('submit', lang('Auth.deactivate_submit_btn'));?></p>
                </form>
                <?php //echo form_close();?>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<?= $this->endSection() ?>

<?= $this->section('templates/scripts_adicionais') ?>
    
    <script>
        $('#modal-active-user').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var userid = button.data('id')
            
            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            $('#form-modal').attr('action','/Autentica/deactivate/'+userid)
            $('#id_user').attr('value',userid)
            //modal.find('.modal-title').text('New message to ' + recipient)
            //modal.find('.modal-body input').val(recipient)
        })
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<?= $this->endSection() ?>