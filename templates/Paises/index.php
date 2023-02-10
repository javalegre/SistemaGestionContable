<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Paise> $paises
 */
?>
<div class="paises index content">
    <?= $this->Html->link(__('New Paise'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Paises') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paises as $paise): ?>
                <tr>
                    <td><?= $this->Number->format($paise->id) ?></td>
                    <td><?= h($paise->nombre) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $paise->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $paise->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $paise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paise->id)]) ?>
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
