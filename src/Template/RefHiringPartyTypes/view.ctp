<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefHiringPartyType $refHiringPartyType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ref Hiring Party Type'), ['action' => 'edit', $refHiringPartyType->hiring_party_type_code_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ref Hiring Party Type'), ['action' => 'delete', $refHiringPartyType->hiring_party_type_code_id], ['confirm' => __('Are you sure you want to delete # {0}?', $refHiringPartyType->hiring_party_type_code_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ref Hiring Party Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ref Hiring Party Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="refHiringPartyTypes view large-9 medium-8 columns content">
    <h3><?= h($refHiringPartyType->hiring_party_type_code_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Hiring Party Type Description') ?></th>
            <td><?= h($refHiringPartyType->hiring_party_type_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Advertising Agency Client') ?></th>
            <td><?= h($refHiringPartyType->advertising_agency_client) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hiring Party Type Code Id') ?></th>
            <td><?= $this->Number->format($refHiringPartyType->hiring_party_type_code_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($refHiringPartyType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($refHiringPartyType->modified) ?></td>
        </tr>
    </table>
</div>
