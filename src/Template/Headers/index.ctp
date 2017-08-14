<?php
/**
  * @var \App\View\AppView $this
  */
?>
<script type="text/javascript" src="js/jquery.js"></script>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Header'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="headers index large-9 medium-8 columns content" id="jquery-example">
    <h3><?= __('Headers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('client_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emmision') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($headers as $header): ?>
            <tr>
                <td><?= $this->Number->format($header->id) ?></td>
                <td><?= $header->has('client') ? $this->Html->link($header->client->name, ['controller' => 'Clients', 'action' => 'view', $header->client->id]) : '' ?></td>
                <td><?= $this->Global->typePayments('one',$header->payment) ?></td>
                <td><?= $this->Number->format($header->total) ?></td>
                <td><?= h($header->emmision) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $header->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $header->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $header->id], ['confirm' => __('Are you sure you want to delete # {0}?', $header->id)]) ?>
                </td>
                <td>
                    <!-- DETALLE PENDIENDTE -->
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
<script>
    $(document).ready(function(){
        $("#jquery-example").append("DOM Cargado");
        $("#jquery-example").append("<br> DOM Cargado 2");
    });
</script>
