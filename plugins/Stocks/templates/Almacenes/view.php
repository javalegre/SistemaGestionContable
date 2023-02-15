<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $almacene
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Almacene'), ['action' => 'edit', $almacene->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Almacene'), ['action' => 'delete', $almacene->id], ['confirm' => __('Are you sure you want to delete # {0}?', $almacene->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Almacenes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Almacene'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="almacenes view content">
            <h3><?= h($almacene->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($almacene->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Direccion') ?></th>
                    <td><?= h($almacene->direccion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo Postal') ?></th>
                    <td><?= h($almacene->codigo_postal) ?></td>
                </tr>
                <tr>
                    <th><?= __('Localidade') ?></th>
                    <td><?= $almacene->has('localidade') ? $this->Html->link($almacene->localidade->id, ['controller' => 'Localidades', 'action' => 'view', $almacene->localidade->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Plan De Cuenta') ?></th>
                    <td><?= $almacene->has('plan_de_cuenta') ? $this->Html->link($almacene->plan_de_cuenta->id, ['controller' => 'PlanDeCuentas', 'action' => 'view', $almacene->plan_de_cuenta->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Geo Posicion') ?></th>
                    <td><?= h($almacene->geo_posicion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($almacene->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($almacene->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($almacene->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= h($almacene->deleted) ?></td>
                </tr>
                <tr>
                    <th><?= __('Predeterminado') ?></th>
                    <td><?= $almacene->predeterminado ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Observaciones') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($almacene->observaciones)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
