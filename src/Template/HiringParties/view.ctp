<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HiringParty $hiringParty
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Hiring Party'), ['action' => 'edit', $hiringParty->hiring_party_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hiring Party'), ['action' => 'delete', $hiringParty->hiring_party_id], ['confirm' => __('Are you sure you want to delete # {0}?', $hiringParty->hiring_party_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hiring Parties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hiring Party'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ref Hiring Party Types'), ['controller' => 'RefHiringPartyTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ref Hiring Party Type'), ['controller' => 'RefHiringPartyTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="hiringParties view large-9 medium-8 columns content">
    <h3><?= h($hiringParty->hiring_party_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Hiring Party Details') ?></th>
            <td><?= h($hiringParty->hiring_party_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hiring Party Type Code') ?></th>
            <td><?= $hiringParty->has('ref_hiring_party_type') ? $this->Html->link($hiringParty->ref_hiring_party_type->hiring_party_type_code_id, ['controller' => 'RefHiringPartyTypes', 'action' => 'view', $hiringParty->ref_hiring_party_type->hiring_party_type_code_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hiring Party Id') ?></th>
            <td><?= $this->Number->format($hiringParty->hiring_party_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($hiringParty->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($hiringParty->modified) ?></td>
        </tr>
    </table>
</div>
