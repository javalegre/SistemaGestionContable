<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PlanDeCuentas Model
 *
 * @property \App\Model\Table\AlmacenesTable&\Cake\ORM\Association\HasMany $Almacenes
 *
 * @method \App\Model\Entity\PlanDeCuenta newEmptyEntity()
 * @method \App\Model\Entity\PlanDeCuenta newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PlanDeCuenta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PlanDeCuenta get($primaryKey, $options = [])
 * @method \App\Model\Entity\PlanDeCuenta findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PlanDeCuenta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PlanDeCuenta[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PlanDeCuenta|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PlanDeCuenta saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PlanDeCuenta[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PlanDeCuenta[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PlanDeCuenta[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PlanDeCuenta[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PlanDeCuentasTable extends Table
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

        $this->setTable('plan_de_cuentas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Almacenes', [
            'foreignKey' => 'plan_de_cuenta_id',
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
            ->maxLength('nombre', 255)
            ->allowEmptyString('nombre');

        $validator
            ->integer('CuentaPadre')
            ->allowEmptyString('CuentaPadre');

        $validator
            ->integer('Nivel')
            ->allowEmptyString('Nivel');

        $validator
            ->decimal('SaldoAnterior')
            ->allowEmptyString('SaldoAnterior');

        $validator
            ->decimal('Debe')
            ->allowEmptyString('Debe');

        $validator
            ->decimal('Haber')
            ->allowEmptyString('Haber');

        $validator
            ->decimal('Saldo')
            ->allowEmptyString('Saldo');

        $validator
            ->integer('TipoCuenta')
            ->allowEmptyString('TipoCuenta');

        $validator
            ->integer('Indent')
            ->allowEmptyString('Indent');

        $validator
            ->integer('Imprescindible')
            ->allowEmptyString('Imprescindible');

        $validator
            ->boolean('Presupuestado')
            ->allowEmptyString('Presupuestado');

        return $validator;
    }
}
