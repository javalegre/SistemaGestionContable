<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Localidade Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $CP
 * @property int|null $provincia_id
 *
 * @property \App\Model\Entity\Provincia $provincia
 * @property \App\Model\Entity\Almacene[] $almacenes
 * @property \App\Model\Entity\Cliente[] $clientes
 */
class Localidade extends Entity
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
        'CP' => true,
        'provincia_id' => true,
        'provincia' => true,
        'almacenes' => true,
        'clientes' => true,
    ];
}
