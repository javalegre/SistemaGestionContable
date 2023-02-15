<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $almacene
 * @var string[]|\Cake\Collection\CollectionInterface $localidades
 * @var string[]|\Cake\Collection\CollectionInterface $planDeCuentas
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $almacene->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $almacene->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Almacenes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="almacenes form content">
            <?= $this->Form->create($almacene) ?>
            <fieldset>
                <legend><?= __('Edit Almacene') ?></legend>
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
