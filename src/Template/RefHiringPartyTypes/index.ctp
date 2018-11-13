<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefHiringPartyType[]|\Cake\Collection\CollectionInterface $refHiringPartyTypes
 */
 $loguser = $this->request->session()->read('Auth.User');
 $userrole = $loguser['role_id'];

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ref Hiring Party Type'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="refHiringPartyTypes index large-9 medium-8 columns content">
    <h3><?= __('Ref Hiring Party Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('hiring_party_type_code_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hiring_party_type_description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('advertising_agency_client') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($refHiringPartyTypes as $refHiringPartyType): ?>
            <tr>
                <td><?= $this->Number->format($refHiringPartyType->hiring_party_type_code_id) ?></td>
                <td><?= h($refHiringPartyType->hiring_party_type_description) ?></td>
                <td><?= h($refHiringPartyType->advertising_agency_client) ?></td>
                <td><?= h($refHiringPartyType->created) ?></td>
                <td><?= h($refHiringPartyType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $refHiringPartyType->hiring_party_type_code_id]) ?>
                   
 <?php if($userrole === "agent de marketing"|| $userrole === "admin"){echo $this->Html->link(__('Edit'), ['action' => 'edit', $refHiringPartyType->hiring_party_type_code_id]) ;} ?>?>
                 
   <?php if($userrole === "admin"){echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $refHiringPartyType->hiring_party_type_code_id], ['confirm' => __('Are you sure you want to delete # {0}?', $refHiringPartyType->hiring_party_type_code_id)]);} ?>
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
