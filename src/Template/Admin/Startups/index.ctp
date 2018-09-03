<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Startup[]|\Cake\Collection\CollectionInterface $startups
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Startup'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="startups index large-9 medium-8 columns content">
    <h3><?= __('Startups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('razao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cnpj') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($startups as $startup): ?>
            <tr>
                <td><?= $this->Number->format($startup->id) ?></td>
                <td><?= h($startup->name) ?></td>
                <td><?= h($startup->razao) ?></td>
                <td><?= $this->Number->format($startup->cnpj) ?></td>
                <td><?= $this->Number->format($startup->status) ?></td>
                <td><?= $this->Number->format($startup->created_by) ?></td>
                <td><?= h($startup->created_at) ?></td>
                <td><?= $this->Number->format($startup->updated_by) ?></td>
                <td><?= h($startup->updated_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $startup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $startup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $startup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $startup->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
