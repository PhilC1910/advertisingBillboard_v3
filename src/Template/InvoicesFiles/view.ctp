<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoicesFile $invoicesFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Invoices File'), ['action' => 'edit', $invoicesFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Invoices File'), ['action' => 'delete', $invoicesFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoicesFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Invoices Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoices File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="invoicesFiles view large-9 medium-8 columns content">
    <h3><?= h($invoicesFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Invoice') ?></th>
            <td><?= $invoicesFile->has('invoice') ? $this->Html->link($invoicesFile->invoice->invoice_id, ['controller' => 'Invoices', 'action' => 'view', $invoicesFile->invoice->invoice_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= $invoicesFile->has('file') ? $this->Html->link($invoicesFile->file->name, ['controller' => 'Files', 'action' => 'view', $invoicesFile->file->file_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($invoicesFile->id) ?></td>
        </tr>
    </table>
</div>
