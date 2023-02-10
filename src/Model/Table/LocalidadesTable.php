<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Localidades Model
 *
 * @property \App\Model\Table\ProvinciasTable&\Cake\ORM\Association\BelongsTo $Provincias
 * @property \App\Model\Table\AlmacenesTable&\Cake\ORM\Association\HasMany $Almacenes
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\HasMany $Clientes
 *
 * @method \App\Model\Entity\Localidade newEmptyEntity()
 * @method \App\Model\Entity\Localidade newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Localidade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Localidade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Localidade findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Localidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Localidade[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Localidade|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Localidade saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Localidade[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Localidade[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Localidade[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Localidade[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LocalidadesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('localidades');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Provincias', [
            'foreignKey' => 'provincia_id',
        ]);
        $this->hasMany('Almacenes', [
            'foreignKey' => 'localidade_id',
        ]);
        $this->hasMany('Clientes', [
            'foreignKey' => 'localidade_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 50)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('CP')
            ->maxLength('CP', 50)
            ->allowEmptyString('CP');

        $validator
            ->integer('provincia_id')
            ->allowEmptyString('provincia_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('provincia_id', 'Provincias'), ['errorField' => 'provincia_id']);

        return $rules;
    }
}
