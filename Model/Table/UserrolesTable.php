<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Userroles Model
 *
 * @method \App\Model\Entity\Userroles get($primaryKey, $options = [])
 * @method \App\Model\Entity\Userroles newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Userroles[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Userroles|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Userroles findOrCreate($search, callable $callback = null, $options = [])
 */
class UserrolesTable extends Table
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

        $this->table('user_roles');
        $this->displayField(['role_id', 'role_text_id', 'role_description']);
        $this->primaryKey('role_id');
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
            ->integer('role_id')
            ->requirePresence('role_id', 'create')
            ->notEmpty('role_id');

        $validator
            ->integer('role_text_id')
            ->requirePresence('role_text_id', 'create')
            ->notEmpty('role_text_id');

        $validator
            ->integer('role_description')
            ->requirePresence('role_description', 'create')
            ->notEmpty('role_description');

        return $validator;
    }
}
