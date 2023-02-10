<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Localidade $localidade
 * @var \Cake\Collection\CollectionInterface|string[] $provincias
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Localidades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="localidades form content">
            <?= $this->Form->create($localidade) ?>
            <fieldset>
                <legend><?= __('Add Localidade') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('CP');
                    echo $this->Form->control('provincia_id', ['options' => $provincias, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
