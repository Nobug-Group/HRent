<!--
    Carrega Gerenciamento de Locador
    Este conteudo é carregado a partir de Views/pessoa/gerLocador.php
-->


<!--
    Carrega Template Base
    Este conteudo é carregado a partir de Views/templates/main.php
-->
<?= $this->extend('templates/main') ?>

<!-- Este conteudo vai para head Views/templates/head.php -->
<?= $this->section('templates/styles_adicionais') ?>
    <!-- Insira aqui css adicionais para sua view -->
<?= $this->endSection() ?>


<!--
    Titulo da pagina
    Este conteudo vai para main.php
-->
<?= $this->section('templates/maintitle') ?>
    <!-- Este conteudo é exibido na barra path  -->
    <h1 class="m-0 text-dark">Gerenciar Locador</h1>
<?= $this->endSection() ?>

<!--
    Caminho da Pagina
    Este conteudo vai para main.php
-->
<?= $this->section('templates/fullpath') ?>
    <li class="breadcrumb-item"><a href="/Main">Inicio</a></li>
    <li class="breadcrumb-item active">Gerenciar Locador</li>
<?= $this->endSection() ?>

<!--
    Conteudo Principal
    Este conteudo vai para main.php
-->
<?= $this->section('templates/conteudo_principal') ?>
<div class="row">
    <div class="col-12">
        <!-- Começo Conteudo Principal -->
            <div class="card">
                <div class="card-header">
                    <div class="col-6">
                        <h3 class="card-title">Locadores</h3>
                    </div>
                    <div class="col">
                        <ul class="nav justify-content-end">
                            <li class="nav-item">
                                <a class="btn btn-default" href="/Main/cadLocador" data-toggle="tooltip" data-placement="bottom" title="Adicionar novo Locatário"><i class="fas fa-user-plus fa-2x"></i></a>
                            </li>
                        </ul>
                    </div> 
                </div>
                
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="user_list" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-Mail</th>
                                <th>RG</th>
                                <th>CPF</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($locadores as $locador):?>
                                <tr>
                                    <td class="align-middle"><?php echo htmlspecialchars($locador['nome_razao'],ENT_QUOTES,'UTF-8');?></td>
                                    <td class="align-middle"><?php echo htmlspecialchars($locador['email'],ENT_QUOTES,'UTF-8');?></td>
                                    <td class="align-middle"><?php echo htmlspecialchars($locador['rg'],ENT_QUOTES,'UTF-8');?></td>
                                    <td class="align-middle"><?php echo htmlspecialchars($locador['cpf_cnpj'],ENT_QUOTES,'UTF-8');?></td>
                                    <td class="text-center align-middle">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <?php echo anchor('Main/edit_locatario/'.$locador['idpessoa'],'<i class="fas fa-edit fa-lg"></i>',array('class' => 'btn btn-default', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Editar Locatário')) ; ?>
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
        <!-- Fim Conteudo Principal -->
    </div>
    <!-- /.col-12 -->
</div>
<!-- /.row -->

<?= $this->endSection() ?>

<!-- 
    Este conteudo vai para scrips templates/scrips.php
-->
<?= $this->section('templates/scripts_adicionais') ?>
    <!-- Inicio-->
    <script>
        $(function () {
            $('#nav_menu_main_locador').addClass('menu-open')
            $('#nav_gerlocador').addClass('active disabled')
            $('#nav_main_button_locador').addClass('active')
        });
    </script>
    <!-- Insira aqui scripts adicionais para sua view -->
<?= $this->endSection() ?>