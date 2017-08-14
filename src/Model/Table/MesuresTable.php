<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mesures Model
 *
 * @method \App\Model\Entity\Mesure get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mesure newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mesure[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mesure|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mesure patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mesure[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mesure findOrCreate($search, callable $callback = null, $options = [])
 */
class MesuresTable extends Table
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

        $this->table('mesures');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Corpses',
            ['foreignKey' => 'mesure_id']
        );
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
            ->allowEmpty('name');

        $validator
            ->boolean('state')
            ->allowEmpty('state');

        return $validator;
    }
}
