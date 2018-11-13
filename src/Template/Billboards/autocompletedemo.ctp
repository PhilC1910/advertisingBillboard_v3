<?php
$urlToCarsAutocompletedemoJson = $this->Url->build([
    "controller" => "Billboards",
    "action" => "findBillboard",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToCarsAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('BillBoards/autocompletedemo', ['block' => 'scriptBottom']);
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Billboards'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<?= $this->Form->create('Billboards') ?>
<fieldset>
    <legend><?= __('Search Billboards') ?></legend>
    <?php
    echo $this->Form->input('name', ['id' => 'autocomplete']);
    ?>
</fieldset>
<?= $this->Form->end() ?>