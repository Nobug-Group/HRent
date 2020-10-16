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
                <h3 class="card-title">Lista de Usuários</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="user_list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><?php echo lang('Auth.index_fname_th');?></th>
                            <th><?php echo lang('Auth.index_lname_th');?></th>
                            <th><?php echo lang('Auth.index_email_th');?></th>
                            <th><?php echo lang('Auth.index_groups_th');?></th>
                            <th><?php echo lang('Auth.index_status_th');?></th>
                            <th><?php echo lang('Auth.index_action_th');?></th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user):?>
                            <tr>
                                <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                                <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                                <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                                <td>
                                    <?php foreach ($user->groups as $group):?>
                                        <?php echo anchor('Autentica/edit_group/' . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?><br />
                                    <?php endforeach?>
                                </td>
                                <td><?php echo ($user->active) ? anchor('Autentica/deactivate/' . $user->id, lang('Auth.index_active_link')) : anchor("Autentica/activate/". $user->id, lang('Auth.index_inactive_link'));?></td>
                                <td><?php echo anchor('Autentica/edit_user/' .  $user->id,' ',array('class' => 'fas fa-user-edit')) ;?></td>
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

<?= $this->endSection() ?>

<?= $this->section('templates/scripts_adicionais') ?>
    <script>
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