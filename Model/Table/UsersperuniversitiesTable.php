<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usersperuniversities Model
 *
 * @method \App\Model\Entity\Usersperuniversities get($primaryKey, $options = [])
 * 
 */
class UsersperuniversitiesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->table('users_per_universities');

        $this->displayField(['id', 'first_name', 'last_name', 'username', 'email', 'email_domain', 'token', 
        'date_token_expiration', 'api_token', 'date_user_activation', 'date_tos', 'active', 'is_superuser', 'role',  
        'date_user_created', 'date_user_modified', 'university_id', 'university_name', 'sigla', 'sede_central', 'sedes_regionales']);

        $this->primaryKey('id');
        
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        return $validator;
    }
}
