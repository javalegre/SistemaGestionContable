<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Configuration Entity
 *
 * @property int $id
 * @property string $system_name
 * @property string $system_abbr
 * @property string $organization_name
 * @property string $email
 * @property string $meta_title
 * @property string $meta_keyword
 * @property string $meta_desc
 * @property string $timezone
 * @property string $author
 * @property bool $user_reg
 * @property string $version
 * @property string $year
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Configuration extends Entity
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
        'system_name' => true,
        'system_abbr' => true,
        'organization_name' => true,
        'email' => true,
        'meta_title' => true,
        'meta_keyword' => true,
        'meta_desc' => true,
        'timezone' => true,
        'author' => true,
        'user_reg' => true,
        'version' => true,
        'year' => true,
        'created' => true,
        'modified' => true,
    ];
}
