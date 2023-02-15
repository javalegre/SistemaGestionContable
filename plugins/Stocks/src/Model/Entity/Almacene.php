<?php
declare(strict_types=1);

namespace Stocks\Model\Entity;

use Cake\ORM\Entity;

/**
 * Almacene Entity
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $direccion
 * @property string|null $codigo_postal
 * @property int|null $localidade_id
 * @property int|null $plan_de_cuenta_id
 * @property bool|null $predeterminado
 * @property string|null $observaciones
 * @property string|null $geo_posicion
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 *
 * @property \Stocks\Model\Entity\Localidade $localidade
 * @property \Stocks\Model\Entity\PlanDeCuenta $plan_de_cuenta
 */
class Almacene extends Entity
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
        'direccion' => true,
        'codigo_postal' => true,
        'localidade_id' => true,
        'plan_de_cuenta_id' => true,
        'predeterminado' => true,
        'observaciones' => true,
        'geo_posicion' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'localidade' => true,
        'plan_de_cuenta' => true,
    ];
}
