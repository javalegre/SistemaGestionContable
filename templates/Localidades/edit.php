<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Localidade $localidade
 * @var string[]|\Cake\Collection\CollectionInterface $provincias
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $localidade->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $localidade->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Localidades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="localidades form content">
            <?= $this->Form->create($localidade) ?>
            <fieldset>
                <legend><?= __('Edit Localidade') ?></legend>
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
