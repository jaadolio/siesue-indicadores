<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Usersperuniversities Entity
 *
 * @property string id
 * @property string first_name
 * @property string last_name
 * @property string username
 * @property string email
 * @property string email_domain
 * @property string token
 * @property string date_token_expiration
 * @property string api_token
 * @property string date_user_activation
 * @property string date_tos
 * @property int active
 * @property int is_superuser
 * @property string role
 * @property string date_user_created
 * @property string date_user_modified
 * @property int university_id
 * @property string university_name
 * @property string sigla
 * @property string sede_central
 * @property string sedes_regionales
 * 
 * @property \App\Model\Entity\Usersperuniversities[] $usersperuniversities
 */
class Usersperuniversities extends Entity
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
        'id' => false
    ];
}
