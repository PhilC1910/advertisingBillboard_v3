<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Billboard[]|\Cake\Collection\CollectionInterface $billboards
 */
 $loguser = $this->request->session()->read('Auth.User');
 $userrole = $loguser['role_id'];
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
           <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('New Billboard'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="billboards index large-9 medium-8 columns content">
        <h3><?= __('Billboards') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                     <th scope="col"><?= $this->Paginator->sort('billboard_id') ?></th>
                     <th scope="col"><?= $this->Paginator->sort('billboard_details') ?></th>
            
                     
                     <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                     <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($billboards as $billboard): ?>
            <tr>
            
                <td><?= $this->Number->format($billboard->billboard_id) ?></td>
                     <td><?= h($billboard->billboard_details) ?></td>
                <td><?= h($billboard->created) ?></td>
            
                <td><?= h($billboard->modified) ?></td>
            
                <td class="actions">
                         <?= $this->Html->link(__('View'), ['action' => 'view', $billboard->billboard_id]) ?>
             
               
                             <?php if($userrole === "agent de marketing"|| $userrole === "admin" ){echo $this->Html->link(__('Edit'), ['action' => 'edit', $billboard->billboard_id]);} ?> 
            
            
                                 <?php if($userrole === "admin"){echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $billboard->billboard_id], ['confirm' => __('Are you sure you want to delete # {0}?', $billboard->billboard_id)]);} ?> 
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
