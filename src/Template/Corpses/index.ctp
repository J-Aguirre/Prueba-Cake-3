<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Corpse'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Headers'), ['controller' => 'Headers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Header'), ['controller' => 'Headers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="corpses index large-9 medium-8 columns content">
    <h3><?= __('Corpses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subtotal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('header_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($corpses as $corpse): ?>
            <tr>
                <td><?= $this->Number->format($corpse->id) ?></td>
                <td><?= $corpse->has('product') ? $this->Html->link($corpse->product->name, ['controller' => 'Products', 'action' => 'view', $corpse->product->id]) : '' ?></td>
                <td><?= $this->Number->format($corpse->quantity) ?></td>
                <td><?= $this->Number->format($corpse->subtotal) ?></td>
                <td><?= $corpse->has('header') ? $this->Html->link($corpse->header->id, ['controller' => 'Headers', 'action' => 'view', $corpse->header->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $corpse->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $corpse->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $corpse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $corpse->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
