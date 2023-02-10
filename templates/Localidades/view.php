<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Localidade $localidade
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Localidade'), ['action' => 'edit', $localidade->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Localidade'), ['action' => 'delete', $localidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $localidade->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Localidades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Localidade'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="localidades view content">
            <h3><?= h($localidade->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($localidade->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('CP') ?></th>
                    <td><?= h($localidade->CP) ?></td>
                </tr>
                <tr>
                    <th><?= __('Provincia') ?></th>
                    <td><?= $localidade->has('provincia') ? $this->Html->link($localidade->provincia->id, ['controller' => 'Provincias', 'action' => 'view', $localidade->provincia->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($localidade->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Almacenes') ?></h4>
                <?php if (!empty($localidade->almacenes)) : ?>
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
                        <?php foreach ($localidade->almacenes as $almacenes) : ?>
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
            <div class="related">
                <h4><?= __('Related Clientes') ?></h4>
                <?php if (!empty($localidade->clientes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Cuit') ?></th>
                            <th><?= __('Domicilio') ?></th>
                            <th><?= __('Localidade Id') ?></th>
                            <th><?= __('Codpos') ?></th>
                            <th><?= __('Provincia Id') ?></th>
                            <th><?= __('Estado') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('NumTelefono1') ?></th>
                            <th><?= __('NumTelefono2') ?></th>
                            <th><?= __('NumFax1') ?></th>
                            <th><?= __('NumFax2') ?></th>
                            <th><?= __('TipoIva') ?></th>
                            <th><?= __('NumCelular') ?></th>
                            <th><?= __('LimiteCredito') ?></th>
                            <th><?= __('CodigoCuenta') ?></th>
                            <th><?= __('IdVendedor') ?></th>
                            <th><?= __('Observaciones') ?></th>
                            <th><?= __('Anulado') ?></th>
                            <th><?= __('Pais') ?></th>
                            <th><?= __('Imp Iva') ?></th>
                            <th><?= __('Tipo Persona') ?></th>
                            <th><?= __('Empleador') ?></th>
                            <th><?= __('Cantidad Empleados') ?></th>
                            <th><?= __('Fecha Vigencia Balance') ?></th>
                            <th><?= __('Cat Monotributo') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($localidade->clientes as $clientes) : ?>
                        <tr>
                            <td><?= h($clientes->id) ?></td>
                            <td><?= h($clientes->nombre) ?></td>
                            <td><?= h($clientes->Cuit) ?></td>
                            <td><?= h($clientes->Domicilio) ?></td>
                            <td><?= h($clientes->localidade_id) ?></td>
                            <td><?= h($clientes->codpos) ?></td>
                            <td><?= h($clientes->provincia_id) ?></td>
                            <td><?= h($clientes->Estado) ?></td>
                            <td><?= h($clientes->email) ?></td>
                            <td><?= h($clientes->NumTelefono1) ?></td>
                            <td><?= h($clientes->NumTelefono2) ?></td>
                            <td><?= h($clientes->NumFax1) ?></td>
                            <td><?= h($clientes->NumFax2) ?></td>
                            <td><?= h($clientes->TipoIva) ?></td>
                            <td><?= h($clientes->NumCelular) ?></td>
                            <td><?= h($clientes->LimiteCredito) ?></td>
                            <td><?= h($clientes->CodigoCuenta) ?></td>
                            <td><?= h($clientes->IdVendedor) ?></td>
                            <td><?= h($clientes->Observaciones) ?></td>
                            <td><?= h($clientes->Anulado) ?></td>
                            <td><?= h($clientes->Pais) ?></td>
                            <td><?= h($clientes->Imp_Iva) ?></td>
                            <td><?= h($clientes->Tipo_Persona) ?></td>
                            <td><?= h($clientes->Empleador) ?></td>
                            <td><?= h($clientes->Cantidad_Empleados) ?></td>
                            <td><?= h($clientes->Fecha_Vigencia_Balance) ?></td>
                            <td><?= h($clientes->Cat_Monotributo) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Clientes', 'action' => 'view', $clientes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Clientes', 'action' => 'edit', $clientes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clientes', 'action' => 'delete', $clientes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientes->id)]) ?>
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
