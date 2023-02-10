<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Almacene> $almacenes
 */
?>
<div class="almacenes index content">
    <?= $this->Html->link(__('New Almacene'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Almacenes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('direccion') ?></th>
                    <th><?= $this->Paginator->sort('codigo_postal') ?></th>
                    <th><?= $this->Paginator->sort('localidade_id') ?></th>
                    <th><?= $this->Paginator->sort('plan_de_cuenta_id') ?></th>
                    <th><?= $this->Paginator->sort('predeterminado') ?></th>
                    <th><?= $this->Paginator->sort('geo_posicion') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($almacenes as $almacene): ?>
                <tr>
                    <td><?= $this->Number->format($almacene->id) ?></td>
                    <td><?= h($almacene->nombre) ?></td>
                    <td><?= h($almacene->direccion) ?></td>
                    <td><?= h($almacene->codigo_postal) ?></td>
                    <td><?= $almacene->has('localidade') ? $this->Html->link($almacene->localidade->id, ['controller' => 'Localidades', 'action' => 'view', $almacene->localidade->id]) : '' ?></td>
                    <td><?= $almacene->has('plan_de_cuenta') ? $this->Html->link($almacene->plan_de_cuenta->id, ['controller' => 'PlanDeCuentas', 'action' => 'view', $almacene->plan_de_cuenta->id]) : '' ?></td>
                    <td><?= h($almacene->predeterminado) ?></td>
                    <td><?= h($almacene->geo_posicion) ?></td>
                    <td><?= h($almacene->created) ?></td>
                    <td><?= h($almacene->modified) ?></td>
                    <td><?= h($almacene->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $almacene->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $almacene->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $almacene->id], ['confirm' => __('Are you sure you want to delete # {0}?', $almacene->id)]) ?>
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
