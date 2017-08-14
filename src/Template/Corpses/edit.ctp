<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $corpse->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $corpse->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Corpses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Headers'), ['controller' => 'Headers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Header'), ['controller' => 'Headers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="corpses form large-9 medium-8 columns content">
    <?= $this->Form->create($corpse) ?>
    <fieldset>
        <legend><?= __('Edit Corpse') ?></legend>
        <?php
            echo $this->Form->input('product_id', ['options' => $products]);
            echo $this->Form->input('quantity');
            echo $this->Form->input('subtotal');
            echo $this->Form->input('header_id', ['options' => $headers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
