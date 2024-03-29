<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Routing\Router;
use Cake\Validation\Validator;
use DateTime;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UserTypes
 * @property \Cake\ORM\Association\HasMany $UserApps
 * @property \Cake\ORM\Association\HasMany $UserStatistics

 */
class UsersTable extends Table
{

    /**
     * testando geracao de codigos
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserTypes', [
            'foreignKey' => 'user_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('UserApps', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserStatistics', [
            'foreignKey' => 'user_id'
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
            ->allowEmpty('id');

        $validator
            ->scalar('password')
            ->requirePresence('password')
            ->notEmpty('password');

        $validator
            ->scalar('name')
            ->requirePresence('name')
            ->notEmpty('name');

        $validator
            ->requirePresence('birthdate')
            ->notEmpty('birthdate');

        $validator
            ->email('email')
            ->requirePresence('email')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('created_by')
            ->requirePresence('created_by')
            ->notEmpty('created_by');

        $validator
            ->integer('updated_by')
            ->requirePresence('updated_by')
            ->notEmpty('updated_by');

        $validator
            ->requirePresence('status')
            ->notEmpty('status');

        return $validator;
    }

    public function findByEmail($email)
    {
        if ($this->find()->where(['email' => $email])->first())
            return true;
        else
            return false;
    }

    public function beforeFind(Event $event, Query $queryData)
    {
        $queryData->where(['Users.status !=' => 0]);
        return $queryData;
    }
}