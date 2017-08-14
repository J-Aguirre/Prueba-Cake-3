<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Corpses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Products
 * @property \Cake\ORM\Association\BelongsTo $Headers
 *
 * @method \App\Model\Entity\Corpse get($primaryKey, $options = [])
 * @method \App\Model\Entity\Corpse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Corpse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Corpse|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Corpse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Corpse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Corpse findOrCreate($search, callable $callback = null, $options = [])
 */
class CorpsesTable extends Table
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

        $this->table('corpses');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Headers', [
            'foreignKey' => 'header_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Mesures', [
            'foreignKey' => 'mesure_id',
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

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        $validator
            ->decimal('subtotal')
            ->requirePresence('subtotal', 'create')
            ->notEmpty('subtotal');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['header_id'], 'Headers'));
        $rules->add($rules->existsIn(['mesure_id'], 'Mesures'));

        return $rules;
    }
}
