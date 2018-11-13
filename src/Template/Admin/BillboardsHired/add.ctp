<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BillboardsHired $billboardsHired
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Billboards Hired'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Billboards'), ['controller' => 'Billboards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Billboard'), ['controller' => 'Billboards', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Hiring Parties'), ['controller' => 'HiringParties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Hiring Party'), ['controller' => 'HiringParties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="billboardsHired form large-9 medium-8 columns content">
    <?= $this->Form->create($billboardsHired) ?>
    <fieldset>
        <legend><?= __('Add Billboards Hired') ?></legend>
        <?php
            echo $this->Form->control('billboard_id', ['options' => $billboards, 'empty' => true]);
            echo $this->Form->control('hiring_party_id', ['options' => $hiringParties, 'empty' => true]);
            echo $this->Form->control('date_hired_from', ['empty' => true]);
            echo $this->Form->control('date_hired_to', ['empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
