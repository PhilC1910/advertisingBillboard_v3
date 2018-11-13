<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BillboardsHired $billboardsHired
 */

?>
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
</div>
