<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Localidade> $localidades
 */
?>
<div class="localidades index content">
    <?= $this->Html->link(__('New Localidade'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Localidades') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('CP') ?></th>
                    <th><?= $this->Paginator->sort('provincia_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($localidades as $localidade): ?>
                <tr>
                    <td><?= $this->Number->format($localidade->id) ?></td>
                    <td><?= h($localidade->nombre) ?></td>
                    <td><?= h($localidade->CP) ?></td>
                    <td><?= $localidade->has('provincia') ? $this->Html->link($localidade->provincia->id, ['controller' => 'Provincias', 'action' => 'view', $localidade->provincia->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $localidade->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $localidade->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $localidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $localidade->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
