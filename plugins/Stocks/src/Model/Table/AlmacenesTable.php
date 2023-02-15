<?php
declare(strict_types=1);

namespace Stocks\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Almacenes Model
 *
 * @property \Stocks\Model\Table\LocalidadesTable&\Cake\ORM\Association\BelongsTo $Localidades
 * @property \Stocks\Model\Table\PlanDeCuentasTable&\Cake\ORM\Association\BelongsTo $PlanDeCuentas
 *
 * @method \Stocks\Model\Entity\Almacene newEmptyEntity()
 * @method \Stocks\Model\Entity\Almacene newEntity(array $data, array $options = [])
 * @method \Stocks\Model\Entity\Almacene[] newEntities(array $data, array $options = [])
 * @method \Stocks\Model\Entity\Almacene get($primaryKey, $options = [])
 * @method \Stocks\Model\Entity\Almacene findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \Stocks\Model\Entity\Almacene patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Stocks\Model\Entity\Almacene[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Stocks\Model\Entity\Almacene|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Stocks\Model\Entity\Almacene saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Stocks\Model\Entity\Almacene[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \Stocks\Model\Entity\Almacene[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \Stocks\Model\Entity\Almacene[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \Stocks\Model\Entity\Almacene[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AlmacenesTable extends Table
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

        $this->setTable('almacenes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Localidades', [
            'foreignKey' => 'localidade_id'
        ]);
        $this->belongsTo('PlanDeCuentas', [
            'foreignKey' => 'plan_de_cuenta_id'
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
            ->maxLength('nombre', 100)
            ->allowEmptyString('nombre');

        $validator
            ->scalar('direccion')
            ->maxLength('direccion', 200)
            ->allowEmptyString('direccion');

        $validator
            ->scalar('codigo_postal')
            ->maxLength('codigo_postal', 10)
            ->allowEmptyString('codigo_postal');

        $validator
            ->integer('localidade_id')
            ->allowEmptyString('localidade_id');

        $validator
            ->integer('plan_de_cuenta_id')
            ->allowEmptyString('plan_de_cuenta_id');

        $validator
            ->boolean('predeterminado')
            ->allowEmptyString('predeterminado');

        $validator
            ->scalar('observaciones')
            ->allowEmptyString('observaciones');

        $validator
            ->scalar('geo_posicion')
            ->allowEmptyString('geo_posicion');

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

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
        $rules->add($rules->existsIn('localidade_id', 'Localidades'), ['errorField' => 'localidade_id']);
        $rules->add($rules->existsIn('plan_de_cuenta_id', 'PlanDeCuentas'), ['errorField' => 'plan_de_cuenta_id']);

        return $rules;
    }
}
