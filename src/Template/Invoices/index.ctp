<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice[]|\Cake\Collection\CollectionInterface $invoices
 */
 $loguser = $this->request->session()->read('Auth.User');
 $userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Invoice'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Billboards Hired'), ['controller' => 'BillboardsHired', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Billboards Hired'), ['controller' => 'BillboardsHired', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payments'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
         <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files','action' => 'index']) ?> </li>
    
    </ul>
</nav>
<div class="invoices index large-9 medium-8 columns content">
    <h3><?= __('Invoices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('invoice_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('billboard_hire_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('invoice_details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoices as $invoice): ?>
            <tr>
                <td><?= $this->Number->format($invoice->invoice_id) ?></td>
                <td><?= $invoice->has('billboards_hired') ? $this->Html->link($invoice->billboards_hired->billboard_hire_id, ['controller' => 'BillboardsHired', 'action' => 'view', $invoice->billboards_hired->billboard_hire_id]) : '' ?></td>
                <td><?= h($invoice->invoice_details) ?></td>
                <td><?= h($invoice->created) ?></td>
                <td><?= h($invoice->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $invoice->invoice_id]) ?>
                   
 <?php if($userrole === "agent de marketing"|| $userrole === "admin"){echo $this->Html->link(__('Edit'), ['action' => 'edit', $invoice->invoice_id]) ;} ?>
                   
  <?php if($userrole === "admin"){echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoice->invoice_id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->invoice_id)]) ;} ?>
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
