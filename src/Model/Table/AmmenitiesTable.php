<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ammenities Model
 *
 * @property \App\Model\Table\PropertiesTable&\Cake\ORM\Association\BelongsToMany $Properties
 *
 * @method \App\Model\Entity\Ammenity newEmptyEntity()
 * @method \App\Model\Entity\Ammenity newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ammenity> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ammenity get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ammenity findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ammenity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ammenity> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ammenity|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ammenity saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ammenity>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ammenity>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ammenity>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ammenity> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ammenity>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ammenity>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ammenity>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ammenity> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AmmenitiesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('ammenities');
        $this->setDisplayField('ammenity');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Properties', [
            'foreignKey' => 'ammenity_id',
            'targetForeignKey' => 'property_id',
            'joinTable' => 'ammenities_properties',
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
            ->scalar('ammenity')
            ->maxLength('ammenity', 50)
            ->requirePresence('ammenity', 'create')
            ->notEmptyString('ammenity');

        return $validator;
    }
}
