<?php
    /**
     * Layout default del sistema
     * 
     * Implementamos el tema de Inspinia, junto con bootstrap y jquery.
     *
     * Desarrollado para ser utilizado como ejemplo unicamente.
     * 
     *
     * @author Javier Alegre <javalegre@gmail.com>
     * @version 1.0.0 creado el 07/02/2023
     */
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
            <?=  $system_name ?>
        </title>

        <?= $this->Html->css(['plugins/bootstrap/bootstrap.min', 'plugins/font-awesome/css/font-awesome.min', 'style']) ?> 
        <?= $this->Html->css(['plugins/toastr/toastr.min', 'plugins/select2/select2', 'plugins/select2/select2-bootstrap.min', 'plugins/select2/select2-inline', 'plugins/dataTables/datatables.min']) ?>

        <?= $this->Html->script(['plugins/jquery/jquery-3.6.3.min','plugins/bootstrap/bootstrap.min', 'plugins/slimscroll/jquery.slimscroll.min', 'plugins/metisMenu/jquery.metisMenu', 'plugins/toastr/toastr.min']) ?>
        <?= $this->Html->script(['plugins/dataTables/datatables.min', 'plugins/dataTables/ellipsis.datatable', 'plugins/dataTables/dataTables.responsive.min', 'plugins/moment/moment.min']) ?>
        <?= $this->Html->script(['plugins/select2/select2.min','plugins/select2/es', 'inspinia']) ?>
        <?= $this->Html->script(['plugins/dataTables/cakephp.dataTables']) ?>
    </head>
    <body class="md-skin">
        <div id="wrapper">
            <!-- Menu de la Izquierda -->
            <?= $this->element('menu_lateral_izquierdo') ?>
            <div id="page-wrapper" class="gray-bg">
                <?= $this->element('menu_superior') ?>
                <div class="wrapper wrapper-content">
                        <?= $this->Flash->render() ?>
                        <?= $this->Flash->render('auth') ?>                    
                    <div class="right_col sidebar-content" role="main">
                        <?= $this->fetch('content') ?>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->element('footer') ?>
    </body>
</html>
