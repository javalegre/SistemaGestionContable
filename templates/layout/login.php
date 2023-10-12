<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?= 'Sistema de Gestión Empresarial' ?></title>
        <!-- < ?= $this->Html->css(['bootstrap.min','font-awesome/css/font-awesome','style','plugins/toastr/toastr.min']) ?>
        < ?= $this->Html->script(['jquery-3.1.1.min','bootstrap.min','plugins/toastr/toastr.min']) ?> -->

        <?= $this->Html->css(['plugins/bootstrap/bootstrap.min', 'plugins/font-awesome/css/font-awesome.min', 'style']) ?> 
        <?= $this->Html->script(['plugins/jquery/jquery-3.6.3.min','plugins/bootstrap/bootstrap.min']) ?>
    </head>
    <body class="gray-bg"  style="background-image: url('<?php echo $this->Url->image('fondo.jpg')?>'); background-size: cover; background-repeat: no-repeat; ackground-attachment: fixed; background-color: #454156; ">
        <?= $this->Flash->render('auth') ?>
        <?= $this->fetch('content') ?>
    </body>
</html>
