<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Billboard $billboard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
           <li><?= $this->Html->link(__('Edit Billboard'), ['action' => 'edit', $billboard->billboard_id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete Billboard'), ['action' => 'delete', $billboard->billboard_id], ['confirm' => __('Are you sure you want to delete # {0}?', $billboard->billboard_id)]) ?> </li>
            <li><?= $this->Html->link(__('List Billboards'), ['action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Billboard'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="billboards view large-9 medium-8 columns content">
    <h3><?= h($billboard->billboard_id) ?></h3>
    <table class="vertical-table">
        <tr>
              <th scope="row"><?= __('Billboard Details') ?></th>
               <td><?= h($billboard->billboard_details) ?></td>
        </tr>
        <tr>
               <th scope="row"><?= __('Billboard Id') ?></th>
            <td><?= $this->Number->format($billboard->billboard_id) ?></td>
        </tr>
        <tr>
        <th scope="row"><?= __('Created') ?></th>
            <td><?= h($billboard->created) ?></td>
        </tr>
        <tr>
                <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($billboard->modified) ?></td>
        </tr>
    </table>
</div>
