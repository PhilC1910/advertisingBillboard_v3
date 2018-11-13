<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoicesFile[]|\Cake\Collection\CollectionInterface $invoicesFiles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Invoices File'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invoicesFiles index large-9 medium-8 columns content">
    <h3><?= __('Invoices Files') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('invoice_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoicesFiles as $invoicesFile): ?>
            <tr>
                <td><?= $this->Number->format($invoicesFile->id) ?></td>
                <td><?= $invoicesFile->has('invoice') ? $this->Html->link($invoicesFile->invoice->invoice_id, ['controller' => 'Invoices', 'action' => 'view', $invoicesFile->invoice->invoice_id]) : '' ?></td>
                <td><?= $invoicesFile->has('file') ? $this->Html->link($invoicesFile->file->name, ['controller' => 'Files', 'action' => 'view', $invoicesFile->file->file_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $invoicesFile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoicesFile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoicesFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoicesFile->id)]) ?>
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
