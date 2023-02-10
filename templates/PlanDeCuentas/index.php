<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PlanDeCuenta> $planDeCuentas
 */
?>
<div class="planDeCuentas index content">
    <?= $this->Html->link(__('New Plan De Cuenta'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Plan De Cuentas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('CuentaPadre') ?></th>
                    <th><?= $this->Paginator->sort('Nivel') ?></th>
                    <th><?= $this->Paginator->sort('SaldoAnterior') ?></th>
                    <th><?= $this->Paginator->sort('Debe') ?></th>
                    <th><?= $this->Paginator->sort('Haber') ?></th>
                    <th><?= $this->Paginator->sort('Saldo') ?></th>
                    <th><?= $this->Paginator->sort('TipoCuenta') ?></th>
                    <th><?= $this->Paginator->sort('Indent') ?></th>
                    <th><?= $this->Paginator->sort('Imprescindible') ?></th>
                    <th><?= $this->Paginator->sort('Presupuestado') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($planDeCuentas as $planDeCuenta): ?>
                <tr>
                    <td><?= $this->Number->format($planDeCuenta->id) ?></td>
                    <td><?= h($planDeCuenta->nombre) ?></td>
                    <td><?= $planDeCuenta->CuentaPadre === null ? '' : $this->Number->format($planDeCuenta->CuentaPadre) ?></td>
                    <td><?= $planDeCuenta->Nivel === null ? '' : $this->Number->format($planDeCuenta->Nivel) ?></td>
                    <td><?= $planDeCuenta->SaldoAnterior === null ? '' : $this->Number->format($planDeCuenta->SaldoAnterior) ?></td>
                    <td><?= $planDeCuenta->Debe === null ? '' : $this->Number->format($planDeCuenta->Debe) ?></td>
                    <td><?= $planDeCuenta->Haber === null ? '' : $this->Number->format($planDeCuenta->Haber) ?></td>
                    <td><?= $planDeCuenta->Saldo === null ? '' : $this->Number->format($planDeCuenta->Saldo) ?></td>
                    <td><?= $planDeCuenta->TipoCuenta === null ? '' : $this->Number->format($planDeCuenta->TipoCuenta) ?></td>
                    <td><?= $planDeCuenta->Indent === null ? '' : $this->Number->format($planDeCuenta->Indent) ?></td>
                    <td><?= $planDeCuenta->Imprescindible === null ? '' : $this->Number->format($planDeCuenta->Imprescindible) ?></td>
                    <td><?= h($planDeCuenta->Presupuestado) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $planDeCuenta->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $planDeCuenta->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $planDeCuenta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $planDeCuenta->id)]) ?>
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
