<?php
/**
 * Nuevo almacén
 * 
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $almacene
 * @var \Cake\Collection\CollectionInterface|string[] $localidades
 * @var \Cake\Collection\CollectionInterface|string[] $planDeCuentas
 */
?>
<div class="ibox">
    <div class="ibox-title">
        <h5><?= __('Nuevo almacén') ?></h5>
        <div class="m-t-n-xs pull-right">
            <?= $this->Form->button('', ['type' => 'button', 'title' => __('Guardar nuevo almacén'), 'id' => 'GuardarAlmacen', 'class' => 'btn btn-monitoreo btn-icon-only btn-circle fa fa-save', 'escape' => true]) ?>
            <?= $this->Html->link('<i class="fa fa-times"></i>',['plugin' => 'Stocks', 'controller' => 'Almacenes', 'action' => 'index'], ['type' => 'button', 'title' => __('Cancelar nuevo almacén'), 'class'=>'btn btn-monitoreo btn-icon-only btn-circle', 'escape' => false]) ?>
        </div>
    </div>
    <div class="ibox-content">
        <?= $this->Form->create($almacene, ['id' => 'almacen', 'type' => 'file']) ?>
        <fieldset>
            <div class="col-md-8">
                <?php
                    echo $this->Form->control('nombre', ['class' => 'form-control', 'label' => 'Nombre del almacén']);
                    echo $this->Form->control('direccion', ['class' => 'form-control']);
                    echo $this->Form->control('codigo_postal', ['class' => 'form-control']);
                    echo $this->Form->control('localidade_id', ['options' => $localidades, 'empty' => true, 'class' => 'form-control', 'label' => 'Localidad']);
                    echo $this->Form->control('observaciones', ['class' => 'form-control']);
                    echo $this->Form->control('geo_posicion', ['class' => 'form-control']);
                ?>
            </div>
            <!-- <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5>< ?= __('Ubicacion del almacen') ?></h5>
                    </div>
                    <div class="panel-body">

                    </div>
                    <div class="panel-body">
                        < ?= $this->Form->input('image_file', ['type' => 'file']) ?>
                    </div>
                </div>
            </div> -->
        </fieldset>
        <?= $this->Form->end() ?>
    </div>
</div>
<script>
    $('#Guardaralmacen').on('click', function(e) {
        document.getElementById("almacen").submit(); 
    });
</script>
