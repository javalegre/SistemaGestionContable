<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provincia $provincia
 * @var \Cake\Collection\CollectionInterface|string[] $paises
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Provincias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="provincias form content">
            <?= $this->Form->create($provincia) ?>
            <fieldset>
                <legend><?= __('Add Provincia') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('paise_id', ['options' => $paises, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
