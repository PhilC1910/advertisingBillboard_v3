<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HiringParty[]|\Cake\Collection\CollectionInterface $hiringParties
 */

$loguser = $this->request->session()->read('Auth.User');

$userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Hiring Party'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ref Hiring Party Types'), ['controller' => 'RefHiringPartyTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ref Hiring Party Type'), ['controller' => 'RefHiringPartyTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="hiringParties index large-9 medium-8 columns content">
    <h3><?= __('Hiring Parties') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('hiring_party_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hiring_party_details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hiring_party_type_code_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                   <th scope="col"><?= $this->Paginator->sort('agency') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('advertising_agency_client') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hiringParties as $hiringParty): ?>
            <tr>
                <td><?= $this->Number->format($hiringParty->hiring_party_id) ?></td>
                <td><?= h($hiringParty->hiring_party_details) ?></td>
                <td><?= $hiringParty->has('ref_hiring_party_type') ? $this->Html->link($hiringParty->ref_hiring_party_type->hiring_party_type_code_id, ['controller' => 'RefHiringPartyTypes', 'action' => 'view', $hiringParty->ref_hiring_party_type->hiring_party_type_code_id]) : '' ?></td>
                <td><?= h($hiringParty->created) ?></td>
                <td><?= h($hiringParty->modified) ?></td>
                 <td><?= h($hiringParty->agency) ?></td>
                 <td><?= $hiringParty->has('advertising_agency_client') ? $this->Html->link($hiringParty->ref_hiring_party_type->advertising_agency_client, ['controller' => 'RefHiringPartyTypes', 'action' => 'view', $hiringParty->ref_hiring_party_type->advertising_agency_client]) : '' ?></td>
                <td class="actions">
              
      <?= $this->Html->link(__('View'), ['action' => 'view', $hiringParty->hiring_party_id]) ?>
     
                
    <?php if($userrole === "agent de marketing"|| $userrole === "admin"){echo$this->Html->link(__('Edit'), ['action' => 'edit', $hiringParty->hiring_party_id]) ;} ?>
             
       <?php if($userrole === "admin"){echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $hiringParty->hiring_party_id], ['confirm' => __('Are you sure you want to delete # {0}?', $hiringParty->hiring_party_id)]) ;} ?> 
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
