<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $almacene
 * @var string[]|\Cake\Collection\CollectionInterface $localidades
 * @var string[]|\Cake\Collection\CollectionInterface $planDeCuentas
 */
?>
<?= $this->Form->create($almacene, ['id' => 'user', 'type' => 'file']) ?>
    <div class="ibox">
        <div class="ibox-title">
            <h5><?= __('Modificar almacen') ?></h5>
            <div class="m-t-n-xs pull-right">
                <?= $this->Form->button('', ['type' => 'button', 'title' => __('Guardar usuario'), 'id' => 'GuardarUsuario', 'class' => 'btn btn-monitoreo btn-icon-only btn-circle fa fa-save', 'escape' => true]) ?>
                <?= $this->Html->link('<i class="fa fa-times"></i>',['controller' => 'Users', 'action' => 'index'], ['type' => 'button', 'title' => __('Cancelar edicion usuario'), 'class'=>'btn btn-monitoreo btn-icon-only btn-circle', 'escape' => false]) ?>
            </div>
        </div>
        <div class="ibox-content">
            
            <fieldset>
                <div class="col-md-6">
                    <?php
                        echo $this->Form->control('nombre', ['class' => 'form-control', 'label' => 'Nombre del almacén']);
                        echo $this->Form->control('direccion', ['class' => 'form-control']);
                        echo $this->Form->control('codigo_postal', ['class' => 'form-control']);
                        echo $this->Form->control('localidade_id', ['options' => $localidades, 'empty' => true, 'class' => 'form-control', 'label' => 'Localidad']);

                        // echo $this->Form->control('plan_de_cuenta_id', ['options' => $planDeCuentas, 'empty' => true, 'class' => 'form-control']);
                        echo $this->Form->control('predeterminado');
                        echo $this->Form->control('observaciones', ['class' => 'form-control']);
                        echo $this->Form->control('geo_posicion');

                        // echo $this->Form->control('username', ['class' => 'form-control', 'label' => 'Usuario']);
                        // echo $this->Form->control('password', ['class' => 'form-control']);
                        // echo $this->Form->control('email', ['class' => 'form-control']);
                        // echo $this->Form->control('apodo', ['class' => 'form-control']);
                        // echo $this->Form->control('observaciones', ['class' => 'form-control']);
                    ?>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5><?= __('Ubicación del Almacén') ?></h5>
                        </div>
                        <div class="panel-body">
                            <div class="align_center">
                                <?= $this->html->image('users/'.$user->ruta_imagen, ['class' => 'img-lg img-thumbnail']) ?>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?= $this->Form->input('image_file', ['type' => 'file']) ?>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
<?= $this->Form->end() ?>
<script>
    // $('#GuardarUsuario').on('click', function(e) {
    //     document.getElementById("user").submit(); 
    // });
</script>


<!-- <div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            < ?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $almacene->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $almacene->id), 'class' => 'side-nav-item']
            ) ?>
            < ?= $this->Html->link(__('List Almacenes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="almacenes form content">
            < ?= $this->Form->create($almacene) ?>
            <fieldset>
                <legend>< ?= __('Edit Almacene') ?></legend>
                < ?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('direccion');
                    echo $this->Form->control('codigo_postal');
                    echo $this->Form->control('localidade_id', ['options' => $localidades, 'empty' => true]);
                    echo $this->Form->control('plan_de_cuenta_id', ['options' => $planDeCuentas, 'empty' => true]);
                    echo $this->Form->control('predeterminado');
                    echo $this->Form->control('observaciones');
                    echo $this->Form->control('geo_posicion');
                    echo $this->Form->control('deleted', ['empty' => true]);
                ?>
            </fieldset>
            < ?= $this->Form->button(__('Submit')) ?>
            < ?= $this->Form->end() ?>
        </div>
    </div>
</div> -->
