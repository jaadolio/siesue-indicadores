<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Userroles Entity
 *
 * @property int $role_id
 * @property string $role_text_id
 * @property string $role_description
 *
 * @property \App\Model\Entity\Userroles[] $userroles
 */
class Userroles extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'role_id' => false,
        '*' => true
    ];
}
