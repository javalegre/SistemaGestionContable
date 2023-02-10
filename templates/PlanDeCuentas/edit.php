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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $planDeCuenta->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $planDeCuenta->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Plan De Cuentas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="planDeCuentas form content">
            <?= $this->Form->create($planDeCuenta) ?>
            <fieldset>
                <legend><?= __('Edit Plan De Cuenta') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('CuentaPadre');
                    echo $this->Form->control('Nivel');
                    echo $this->Form->control('SaldoAnterior');
                    echo $this->Form->control('Debe');
                    echo $this->Form->control('Haber');
                    echo $this->Form->control('Saldo');
                    echo $this->Form->control('TipoCuenta');
                    echo $this->Form->control('Indent');
                    echo $this->Form->control('Imprescindible');
                    echo $this->Form->control('Presupuestado');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
