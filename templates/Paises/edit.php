<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paise $paise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $paise->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $paise->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Paises'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="paises form content">
            <?= $this->Form->create($paise) ?>
            <fieldset>
                <legend><?= __('Edit Paise') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
