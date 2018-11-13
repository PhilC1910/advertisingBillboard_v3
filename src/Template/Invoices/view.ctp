<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Invoice'), ['action' => 'edit', $invoice->invoice_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Invoice'), ['action' => 'delete', $invoice->invoice_id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->invoice_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Billboards Hired'), ['controller' => 'BillboardsHired', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Billboards Hired'), ['controller' => 'BillboardsHired', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payments'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invoices view large-9 medium-8 columns content">
    <h3><?= h($invoice->invoice_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Billboards Hired') ?></th>
            <td><?= $invoice->has('billboards_hired') ? $this->Html->link($invoice->billboards_hired->billboard_hire_id, ['controller' => 'BillboardsHired', 'action' => 'view', $invoice->billboards_hired->billboard_hire_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Invoice Details') ?></th>
            <td><?= h($invoice->invoice_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Invoice Id') ?></th>
            <td><?= $this->Number->format($invoice->invoice_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($invoice->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($invoice->modified) ?></td>
        </tr>
    </table>
</div>
