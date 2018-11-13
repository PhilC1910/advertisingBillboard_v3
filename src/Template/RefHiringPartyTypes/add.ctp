<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefHiringPartyType $refHiringPartyType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ref Hiring Party Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="refHiringPartyTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($refHiringPartyType) ?>
    <fieldset>
        <legend><?= __('Add Ref Hiring Party Type') ?></legend>
        <?php
            echo $this->Form->control('hiring_party_type_description');
            echo $this->Form->control('advertising_agency_client');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
