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
    <h1 class="m-0 text-dark">Editar Locador</h1>
<?= $this->endSection() ?>

<!--
    Caminho da Pagina
    Este conteudo vai para main.php
-->
<?= $this->section('templates/fullpath') ?>
    <li class="breadcrumb-item"><a href="/Main">Inicio</a></li>
    <li class="breadcrumb-item active">Editar Locador</li>
<?= $this->endSection() ?>

<!--
    Conteudo Principal
    Este conteudo vai para main.php
-->
<?= $this->section('templates/conteudo_principal') ?>
<div class="row">
    <div class="col-12">
        <!-- Inicio -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Editar Locador</h3>
                </div>
            
                <!-- /.card-header -->
                <form role="form" method="POST" action="/Main/addLocador">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nome_razao">Nome completo:</label>
                            <input type="text" class="form-control" id="nome_razao" name="nome_razao" placeholder="Nome completo..." >
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail:</label>                  
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail..." >
                        </div>
                        <div class="form-group">
                            <label for="rg">Doc. Identidade:</label>                  
                            <input type="text" class="form-control" id="rg" name="rg" placeholder="RG..." >
                        </div>
                        
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF...">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </div>
                </form>
            </div>    
        </div>
        <!-- Termino -->
        <!-- Insira aqui css adicionais para sua view -->
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