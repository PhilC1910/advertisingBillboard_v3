<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BillboardsHired[]|\Cake\Collection\CollectionInterface $billboardsHired
 */
 $loguser = $this->request->session()->read('Auth.User');
 $userrole = $loguser['role_id'];
 
$this->extend('/Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
      <li class="heading"><?= __('Actions') ?></li>
     <li><?= $this->Html->link(__('New Billboards Hired'), ['action' => 'add']) ?></li>
   <li><?= $this->Html->link(__('List Billboards'), ['controller' => 'Billboards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Billboard'), ['controller' => 'Billboards', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Hiring Parties'), ['controller' => 'HiringParties', 'action' => 'index']) ?></li>
          <li><?= $this->Html->link(__('New Hiring Party'), ['controller' => 'HiringParties', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
           <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?></li>
         <li><?= $this->Html->link(__('New Invoices'), ['controller' => 'Invoices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="billboardsHired index large-9 medium-8 columns content">
       <h3><?= __('Billboards Hired') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                     <th scope="col"><?= $this->Paginator->sort('Billboard Hire Id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('billboard_id') ?></th>
                   <th scope="col"><?= $this->Paginator->sort('hiring_party_id') ?></th>
                     <th scope="col"><?= $this->Paginator->sort('date_hired_from') ?></th>
                     <th scope="col"><?= $this->Paginator->sort('date_hired_to') ?></th>
                     <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($billboardsHired as $billboardsHired): ?>
            <tr>
                <td><?= $this->Number->format($billboardsHired->billboard_hire_id) ?></td>
                <td><?= $billboardsHired->has('billboard') ? $this->Html->link($billboardsHired->billboard->billboard_id, ['controller' => 'Billboards', 'action' => 'view', $billboardsHired->billboard->billboard_id]) : '' ?></td>
                <td><?= $billboardsHired->has('hiring_party') ? $this->Html->link($billboardsHired->hiring_party->hiring_party_id, ['controller' => 'HiringParties', 'action' => 'view', $billboardsHired->hiring_party->hiring_party_id]) : '' ?></td>
                <td><?= h($billboardsHired->date_hired_from) ?></td>
                <td><?= h($billboardsHired->date_hired_to) ?></td>
                <td><?= h($billboardsHired->created) ?></td>
                <td><?= h($billboardsHired->modified) ?></td>
                <td><?= $billboardsHired->has('user') ? $this->Html->link($billboardsHired->user->user_id, ['controller' => 'Users', 'action' => 'view', $billboardsHired->user->user_id]) : '' ?></td>
                <td class="actions">
                  
    <?= $this->Html->link(__('View'), ['action' => 'view', $billboardsHired->billboard_hire_id]) ?>
                      <?php if($userrole === "agent de marketing"|| $userrole === "admin"){echo $this->Html->link(__('Edit'), ['action' => 'edit', $billboardsHired->billboard_hire_id]);} ?> 
                
      <?php if($userrole === "admin") {echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $billboardsHired->billboard_hire_id], ['confirm' => __('Are you sure you want to delete # {0}?', $billboardsHired->billboard_hire_id)]) ;} ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
              <?= $this->Paginator->first(   '<< ' . __('first')) ?>
                 <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
               <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
         <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
