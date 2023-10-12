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
                        echo $this->Form->control('predeterminado');
                        echo $this->Form->control('observaciones', ['class' => 'form-control']);
                        echo $this->Form->control('geo_posicion');
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