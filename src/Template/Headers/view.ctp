<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Header'), ['action' => 'edit', $header->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Header'), ['action' => 'delete', $header->id], ['confirm' => __('Are you sure you want to delete # {0}?', $header->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Headers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Header'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="headers view large-9 medium-8 columns content">
    <h3><?= h($header->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= $header->has('client') ? $this->Html->link($header->client->name, ['controller' => 'Clients', 'action' => 'view', $header->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($header->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($header->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emmision') ?></th>
            <td><?= h($header->emmision) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment') ?></th>
            <td><?= $this->Global->typePayments('one', $header->payment) ?></td>
        </tr>
    </table>

    <table style="width:100%">
      <tr>
        <th>N°</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Mesure</th>
        <th>Semi-Total</th>
      </tr>
      <?php $i=0; foreach ($header->corpses as $key => $value){ ?>
      <tr>
        <td><h><?php echo $i+1;?></h></td>
        <td><?php echo $header->corpses[$key]->product->name ?></td>
        <td><?php echo $header->corpses[$key]['quantity']?></td>
        <td><?php echo $header->corpses[$key]->mesure->name?></td>
        <td><?php echo $header->corpses[$key]['subtotal']?></td>
      </tr>
      <?php $i++; } ?>
    </table>
</div>
