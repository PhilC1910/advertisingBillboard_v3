<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Billboard $billboard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Billboards'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="billboards form large-9 medium-8 columns content">
    <?= $this->Form->create($billboard) ?>
    <fieldset>
        <legend><?= __('Add Billboard') ?></legend>
        <?php
            echo $this->Form->control('billboard_details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
