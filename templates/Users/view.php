<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="ibox">
    <div class="ibox-title">
        <h5><?= __('Ver usuario') ?></h5>
        <div class="m-t-n-xs pull-right">
            <?= $this->Html->link('<i class="fa fa-times"></i>',['controller' => 'Users', 'action' => 'index'], ['type' => 'button', 'title' => __('Cancelar nuevo usuario'), 'class'=>'btn btn-monitoreo btn-icon-only btn-circle', 'escape' => false]) ?>
        </div>
    </div>
    <div class="ibox-content">
        <?= $this->Form->create($user) ?>
        <fieldset>
            <div class="col-md-8">
                <?php
                    echo $this->Form->control('nombre', ['class' => 'form-control', 'label' => 'Nombre completo', 'readonly']);
                    echo $this->Form->control('username', ['class' => 'form-control', 'label' => 'Usuario', 'readonly']);
                    echo $this->Form->control('password', ['class' => 'form-control', 'readonly']);
                    echo $this->Form->control('email', ['class' => 'form-control', 'readonly']);
                    echo $this->Form->control('apodo', ['class' => 'form-control', 'readonly']);
                    echo $this->Form->control('observaciones', ['class' => 'form-control', 'readonly']);
                ?>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5><?= __('Imagen de Usuario') ?></h5>
                    </div>
                    <div class="panel-body">
                        <div class="align_center">
                                <?= $this->html->image('users/'.$user->ruta_imagen, ['class' => 'img-lg img-thumbnail']) ?>
                            </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <?= $this->Form->end() ?>
    </div>
</div>