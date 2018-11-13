<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Billboard $billboard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $billboard->billboard_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $billboard->billboard_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Billboards'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="billboards form large-9 medium-8 columns content">
    <?= $this->Form->create($billboard) ?>
    <fieldset>
        <legend><?= __('Edit Billboard') ?></legend>
        <?php
            echo $this->Form->control('billboard_details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
