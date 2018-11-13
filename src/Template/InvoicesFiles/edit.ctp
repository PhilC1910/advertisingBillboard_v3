<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoicesFile $invoicesFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $invoicesFile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $invoicesFile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Invoices Files'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invoicesFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($invoicesFile) ?>
    <fieldset>
        <legend><?= __('Edit Invoices File') ?></legend>
        <?php
            echo $this->Form->control('invoice_id', ['options' => $invoices]);
            echo $this->Form->control('file_id', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>