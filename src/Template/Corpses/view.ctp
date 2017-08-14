<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Corpse'), ['action' => 'edit', $corpse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Corpse'), ['action' => 'delete', $corpse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $corpse->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Corpses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Corpse'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Headers'), ['controller' => 'Headers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Header'), ['controller' => 'Headers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="corpses view large-9 medium-8 columns content">
    <h3><?= h($corpse->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $corpse->has('product') ? $this->Html->link($corpse->product->name, ['controller' => 'Products', 'action' => 'view', $corpse->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Header') ?></th>
            <td><?= $corpse->has('header') ? $this->Html->link($corpse->header->id, ['controller' => 'Headers', 'action' => 'view', $corpse->header->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($corpse->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($corpse->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subtotal') ?></th>
            <td><?= $this->Number->format($corpse->subtotal) ?></td>
        </tr>
    </table>
</div>
