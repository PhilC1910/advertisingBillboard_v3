
<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "RefHiringPartyTypes",
    "action" => "getByHiringParty",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('HiringParties/add', ['block' => 'scriptBottom']);
?>


<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HiringParty $hiringParty
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Hiring Parties'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ref Hiring Party Types'), ['controller' => 'RefHiringPartyTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ref Hiring Party Type'), ['controller' => 'RefHiringPartyTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="hiringParties form large-9 medium-8 columns content">
    <?= $this->Form->create($hiringParty) ?>
    <fieldset>
        <legend><?= __('Add Hiring Party') ?></legend>
     
            <?php
        // echo $this->Form->control('user_id', ['options' => $users]);
        echo $this->Form->control('hiring_party_id', ['options' => $hiringParties]);
        echo $this->Form->control('hiring_party_type_code_id', ['options' => $refHringPartyType]);
        echo $this->Form->control('hiring_party_details', ['id'=>'autocomplete']);
        echo $this->Form->control('hiring_party_type_code_id', ['options' => $refHiringPartyTypes]);
        echo $this->Form->control('agency');
        echo $this->Form->control('advertising_agency_client', ['options' => $refHiringPartyTypes]);
        ?>
        
       
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
