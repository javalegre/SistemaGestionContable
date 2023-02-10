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
            <?= $this->Html->link(__('Edit Paise'), ['action' => 'edit', $paise->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Paise'), ['action' => 'delete', $paise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paise->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Paises'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Paise'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="paises view content">
            <h3><?= h($paise->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($paise->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($paise->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Provincias') ?></h4>
                <?php if (!empty($paise->provincias)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Paise Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($paise->provincias as $provincias) : ?>
                        <tr>
                            <td><?= h($provincias->id) ?></td>
                            <td><?= h($provincias->nombre) ?></td>
                            <td><?= h($provincias->paise_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Provincias', 'action' => 'view', $provincias->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Provincias', 'action' => 'edit', $provincias->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Provincias', 'action' => 'delete', $provincias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $provincias->id)]) ?>
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
