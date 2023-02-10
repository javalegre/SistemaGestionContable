<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PlanDeCuenta Entity
 *
 * @property int $id
 * @property string|null $nombre
 * @property int|null $CuentaPadre
 * @property int|null $Nivel
 * @property string|null $SaldoAnterior
 * @property string|null $Debe
 * @property string|null $Haber
 * @property string|null $Saldo
 * @property int|null $TipoCuenta
 * @property int|null $Indent
 * @property int|null $Imprescindible
 * @property bool|null $Presupuestado
 *
 * @property \App\Model\Entity\Almacene[] $almacenes
 */
class PlanDeCuenta extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'nombre' => true,
        'CuentaPadre' => true,
        'Nivel' => true,
        'SaldoAnterior' => true,
        'Debe' => true,
        'Haber' => true,
        'Saldo' => true,
        'TipoCuenta' => true,
        'Indent' => true,
        'Imprescindible' => true,
        'Presupuestado' => true,
        'almacenes' => true,
    ];
}
