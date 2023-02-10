<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provincia $provincia
 * @var string[]|\Cake\Collection\CollectionInterface $paises
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $provincia->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $provincia->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Provincias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="provincias form content">
            <?= $this->Form->create($provincia) ?>
            <fieldset>
                <legend><?= __('Edit Provincia') ?></legend>
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
