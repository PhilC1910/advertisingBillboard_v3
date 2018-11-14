<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BillboardsHired $billboardsHired
 */


$this->extend('/Layout/TwitterBootstrap/dashboard');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Billboards Hired'), ['action' => 'edit', $billboardsHired->billboard_hire_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Billboards Hired'), ['action' => 'delete', $billboardsHired->billboard_hire_id], ['confirm' => __('Are you sure you want to delete # {0}?', $billboardsHired->billboard_hire_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Billboards Hired'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Billboards Hired'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Billboards'), ['controller' => 'Billboards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Billboard'), ['controller' => 'Billboards', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hiring Parties'), ['controller' => 'HiringParties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hiring Party'), ['controller' => 'HiringParties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="billboardsHired view large-9 medium-8 columns content">
    <h3><?= h($billboardsHired->billboard_hire_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Billboard') ?></th>
            <td><?= $billboardsHired->has('billboard') ? $this->Html->link($billboardsHired->billboard->billboard_id, ['controller' => 'Billboards', 'action' => 'view', $billboardsHired->billboard->billboard_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hiring Party') ?></th>
            <td><?= $billboardsHired->has('hiring_party') ? $this->Html->link($billboardsHired->hiring_party->hiring_party_id, ['controller' => 'HiringParties', 'action' => 'view', $billboardsHired->hiring_party->hiring_party_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $billboardsHired->has('user') ? $this->Html->link($billboardsHired->user->user_id, ['controller' => 'Users', 'action' => 'view', $billboardsHired->user->user_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Billboard Hire Id') ?></th>
            <td><?= $this->Number->format($billboardsHired->billboard_hire_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Hired From') ?></th>
            <td><?= h($billboardsHired->date_hired_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Hired To') ?></th>
            <td><?= h($billboardsHired->date_hired_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($billboardsHired->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($billboardsHired->modified) ?></td>
        </tr>
    </table>
</div>
