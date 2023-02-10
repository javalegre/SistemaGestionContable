<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Almacene $almacene
 * @var \Cake\Collection\CollectionInterface|string[] $localidades
 * @var \Cake\Collection\CollectionInterface|string[] $planDeCuentas
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Almacenes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="almacenes form content">
            <?= $this->Form->create($almacene) ?>
            <fieldset>
                <legend><?= __('Add Almacene') ?></legend>
                <?php
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
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
