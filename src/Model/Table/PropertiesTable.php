<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Properties Model
 *
 * @property \App\Model\Table\AmmenitiesTable&\Cake\ORM\Association\BelongsToMany $Ammenities
 *
 * @method \App\Model\Entity\Property newEmptyEntity()
 * @method \App\Model\Entity\Property newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Property> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Property get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Property findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Property patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Property> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Property|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Property saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Property>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Property>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Property>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Property> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Property>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Property>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Property>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Property> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PropertiesTable extends Table
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

        $this->setTable('properties');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Ammenities', [
            'foreignKey' => 'property_id',
            'targetForeignKey' => 'ammenity_id',
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
            ->scalar('name')
            ->maxLength('name', 150)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('street_address')
            ->maxLength('street_address', 50)
            ->requirePresence('street_address', 'create')
            ->notEmptyString('street_address');

        $validator
            ->scalar('city')
            ->maxLength('city', 50)
            ->requirePresence('city', 'create')
            ->notEmptyString('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 2)
            ->requirePresence('state', 'create')
            ->notEmptyString('state');

        $validator
            ->scalar('postal_code')
            ->maxLength('postal_code', 7)
            ->requirePresence('postal_code', 'create')
            ->notEmptyString('postal_code');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->integer('baths')
            ->requirePresence('baths', 'create')
            ->notEmptyString('baths');

        $validator
            ->integer('beds')
            ->requirePresence('beds', 'create')
            ->notEmptyString('beds');

        $validator
            ->integer('sqft')
            ->requirePresence('sqft', 'create')
            ->notEmptyString('sqft');

        $validator
            ->decimal('acres')
            ->requirePresence('acres', 'create')
            ->notEmptyString('acres');

        $validator
            ->boolean('active')
            ->notEmptyString('active');

        return $validator;
    }
}
