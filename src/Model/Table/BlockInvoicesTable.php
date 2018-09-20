<?php
namespace App\Model\Table;

use App\Model\Entity\BlockInvoice;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Routing\Router;
use Cake\Validation\Validator;
use DateTime;

/**
 * BlockInvoices Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Blocks
 * @property \Cake\ORM\Association\BelongsTo $InvoicePlans

 */
class BlockInvoicesTable extends Table
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

        $this->setTable('block_invoices');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Blocks', [
            'foreignKey' => 'block_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('InvoicePlans', [
            'foreignKey' => 'invoice_plan_id',
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
            ->allowEmpty('id');

        $validator
            ->decimal('value')
            ->requirePresence('value')
            ->notEmpty('value');

        $validator
            ->requirePresence('issue_date')
            ->notEmpty('issue_date');

        $validator
            ->requirePresence('expiration_date')
            ->notEmpty('expiration_date');

        $validator
            ->requirePresence('reference_date')
            ->notEmpty('reference_date');

        $validator
            ->requirePresence('payment_status')
            ->notEmpty('payment_status');

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

    public function beforeFind(Event $event, Query $queryData)
    {
        $queryData->where(['BlockInvoices.status !=' => 0]);
        return $queryData;
    }
}