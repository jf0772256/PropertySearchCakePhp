<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Amenities Model
 *
 * @property \App\Model\Table\PropertiesTable&\Cake\ORM\Association\BelongsToMany $Properties
 *
 * @method \App\Model\Entity\Amenity newEmptyEntity()
 * @method \App\Model\Entity\Amenity newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Amenity> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Amenity get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Amenity findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Amenity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Amenity> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Amenity|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Amenity saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Amenity>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Amenity>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Amenity>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Amenity> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Amenity>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Amenity>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Amenity>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Amenity> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AmenitiesTable extends Table
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

        $this->setTable('amenities');
        $this->setDisplayField('ammenity');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Properties', [
            'foreignKey' => 'amenity_id',
            'targetForeignKey' => 'property_id',
            'joinTable' => 'amenities_properties',
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
