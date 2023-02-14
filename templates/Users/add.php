<?php
/**
 * Nuevo usuario
 * 
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="ibox">
    <div class="ibox-title">
        <h5><?= __('Nuevo usuario') ?></h5>
        <div class="m-t-n-xs pull-right">
            <?= $this->Form->button('', ['type' => 'button', 'title' => __('Guardar nuevo usuario'), 'id' => 'GuardarUsuario', 'class' => 'btn btn-monitoreo btn-icon-only btn-circle fa fa-save', 'escape' => true]) ?>
            <?= $this->Html->link('<i class="fa fa-times"></i>',['controller' => 'Users', 'action' => 'index'], ['type' => 'button', 'title' => __('Cancelar nuevo usuario'), 'class'=>'btn btn-monitoreo btn-icon-only btn-circle', 'escape' => false]) ?>
        </div>
    </div>
    <div class="ibox-content">
        <?= $this->Form->create($user, ['id' => 'user', 'type' => 'file']) ?>
        <fieldset>
            <div class="col-md-8">
                <?php
                    echo $this->Form->control('nombre', ['class' => 'form-control', 'label' => 'Nombre completo']);
                    echo $this->Form->control('username', ['class' => 'form-control', 'label' => 'Usuario']);
                    echo $this->Form->control('password', ['class' => 'form-control']);
                    echo $this->Form->control('email', ['class' => 'form-control']);
                    echo $this->Form->control('apodo', ['class' => 'form-control']);
                    echo $this->Form->control('observaciones', ['class' => 'form-control']);
                ?>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5><?= __('Imagen de Usuario') ?></h5>
                    </div>
                    <div class="panel-body">

                    </div>
                    <div class="panel-body">
                        <?= $this->Form->input('image_file', ['type' => 'file']) ?>
                    </div>
                </div>
            </div>
        </fieldset>
        <?= $this->Form->end() ?>
    </div>
</div>
<script>
    $('#GuardarUsuario').on('click', function(e) {
        document.getElementById("user").submit(); 
    });
</script>