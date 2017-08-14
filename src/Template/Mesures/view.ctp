<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mesure'), ['action' => 'edit', $mesure->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mesure'), ['action' => 'delete', $mesure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mesure->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mesures'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mesure'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mesures view large-9 medium-8 columns content">
    <h3><?= h($mesure->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($mesure->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mesure->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $this->Global->stateDescriptor('one',$mesure->state); ?></td>
        </tr>
    </table>
</div>
