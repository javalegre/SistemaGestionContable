<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlanDeCuenta $planDeCuenta
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Plan De Cuenta'), ['action' => 'edit', $planDeCuenta->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Plan De Cuenta'), ['action' => 'delete', $planDeCuenta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $planDeCuenta->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Plan De Cuentas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Plan De Cuenta'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="planDeCuentas view content">
            <h3><?= h($planDeCuenta->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($planDeCuenta->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($planDeCuenta->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('CuentaPadre') ?></th>
                    <td><?= $planDeCuenta->CuentaPadre === null ? '' : $this->Number->format($planDeCuenta->CuentaPadre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nivel') ?></th>
                    <td><?= $planDeCuenta->Nivel === null ? '' : $this->Number->format($planDeCuenta->Nivel) ?></td>
                </tr>
                <tr>
                    <th><?= __('SaldoAnterior') ?></th>
                    <td><?= $planDeCuenta->SaldoAnterior === null ? '' : $this->Number->format($planDeCuenta->SaldoAnterior) ?></td>
                </tr>
                <tr>
                    <th><?= __('Debe') ?></th>
                    <td><?= $planDeCuenta->Debe === null ? '' : $this->Number->format($planDeCuenta->Debe) ?></td>
                </tr>
                <tr>
                    <th><?= __('Haber') ?></th>
                    <td><?= $planDeCuenta->Haber === null ? '' : $this->Number->format($planDeCuenta->Haber) ?></td>
                </tr>
                <tr>
                    <th><?= __('Saldo') ?></th>
                    <td><?= $planDeCuenta->Saldo === null ? '' : $this->Number->format($planDeCuenta->Saldo) ?></td>
                </tr>
                <tr>
                    <th><?= __('TipoCuenta') ?></th>
                    <td><?= $planDeCuenta->TipoCuenta === null ? '' : $this->Number->format($planDeCuenta->TipoCuenta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Indent') ?></th>
                    <td><?= $planDeCuenta->Indent === null ? '' : $this->Number->format($planDeCuenta->Indent) ?></td>
                </tr>
                <tr>
                    <th><?= __('Imprescindible') ?></th>
                    <td><?= $planDeCuenta->Imprescindible === null ? '' : $this->Number->format($planDeCuenta->Imprescindible) ?></td>
                </tr>
                <tr>
                    <th><?= __('Presupuestado') ?></th>
                    <td><?= $planDeCuenta->Presupuestado ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Almacenes') ?></h4>
                <?php if (!empty($planDeCuenta->almacenes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Direccion') ?></th>
                            <th><?= __('Codigo Postal') ?></th>
                            <th><?= __('Localidade Id') ?></th>
                            <th><?= __('Plan De Cuenta Id') ?></th>
                            <th><?= __('Predeterminado') ?></th>
                            <th><?= __('Observaciones') ?></th>
                            <th><?= __('Geo Posicion') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($planDeCuenta->almacenes as $almacenes) : ?>
                        <tr>
                            <td><?= h($almacenes->id) ?></td>
                            <td><?= h($almacenes->nombre) ?></td>
                            <td><?= h($almacenes->direccion) ?></td>
                            <td><?= h($almacenes->codigo_postal) ?></td>
                            <td><?= h($almacenes->localidade_id) ?></td>
                            <td><?= h($almacenes->plan_de_cuenta_id) ?></td>
                            <td><?= h($almacenes->predeterminado) ?></td>
                            <td><?= h($almacenes->observaciones) ?></td>
                            <td><?= h($almacenes->geo_posicion) ?></td>
                            <td><?= h($almacenes->created) ?></td>
                            <td><?= h($almacenes->modified) ?></td>
                            <td><?= h($almacenes->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Almacenes', 'action' => 'view', $almacenes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Almacenes', 'action' => 'edit', $almacenes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Almacenes', 'action' => 'delete', $almacenes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $almacenes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
