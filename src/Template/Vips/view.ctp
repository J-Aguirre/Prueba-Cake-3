<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vip'), ['action' => 'edit', $vip->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vip'), ['action' => 'delete', $vip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vip->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vips'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vip'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vips view large-9 medium-8 columns content">
    <h3><?= h($vip->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nick') ?></th>
            <td><?= h($vip->nick) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= $vip->has('client') ? $this->Html->link($vip->client->name, ['controller' => 'Clients', 'action' => 'view', $vip->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vip->id) ?></td>
        </tr>
    </table>
</div>
