<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Headers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clients
 *
 * @method \App\Model\Entity\Header get($primaryKey, $options = [])
 * @method \App\Model\Entity\Header newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Header[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Header|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Header patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Header[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Header findOrCreate($search, callable $callback = null, $options = [])
 */
class HeadersTable extends Table
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

        $this->table('headers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Corpses', [
            'foreignKey' => 'header_id',
            'joinType' => 'INNER'
        ]);
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

        /*$validator
            ->integer('payment')
            ->requirePresence('payment', 'create')
            ->notEmpty('payment');*/

        $validator
            ->decimal('total')
            ->requirePresence('total', 'create')
            ->notEmpty('total');

        $validator
            ->date('emmision')
            ->requirePresence('emmision', 'create')
            ->notEmpty('emmision');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['client_id'], 'Clients'));

        return $rules;
    }
}
