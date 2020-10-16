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
    <h1 class="m-0 text-dark">Gerenciamento de Usuários</h1>
<?= $this->endSection() ?>

<!--
    Caminho da Pagina
    Este conteudo vai para main.php
-->
<?= $this->section('templates/fullpath') ?>
    <li class="breadcrumb-item"><a href="/Main">Inicio</a></li>
    <li class="breadcrumb-item active">Gerenciamento de Usuários</li>
<?= $this->endSection() ?>

<!--
    Conteudo Principal
    Este conteudo vai para main.php
-->
<?= $this->section('templates/conteudo_principal') ?>
<div class="row">
    <div class="col-12">
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