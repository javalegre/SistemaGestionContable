<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Provincias Model
 *
 * @property \App\Model\Table\PaisesTable&\Cake\ORM\Association\BelongsTo $Paises
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\HasMany $Clientes
 * @property \App\Model\Table\LocalidadesTable&\Cake\ORM\Association\HasMany $Localidades
 *
 * @method \App\Model\Entity\Provincia newEmptyEntity()
 * @method \App\Model\Entity\Provincia newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Provincia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Provincia get($primaryKey, $options = [])
 * @method \App\Model\Entity\Provincia findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Provincia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Provincia[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Provincia|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Provincia saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Provincia[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Provincia[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Provincia[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Provincia[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProvinciasTable extends Table
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

        $this->setTable('provincias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Paises', [
            'foreignKey' => 'paise_id',
        ]);
        $this->hasMany('Clientes', [
            'foreignKey' => 'provincia_id',
        ]);
        $this->hasMany('Localidades', [
            'foreignKey' => 'provincia_id',
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
            ->allowEmptyString('nombre');

        $validator
            ->integer('paise_id')
            ->allowEmptyString('paise_id');

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
        $rules->add($rules->existsIn('paise_id', 'Paises'), ['errorField' => 'paise_id']);

        return $rules;
    }
}
