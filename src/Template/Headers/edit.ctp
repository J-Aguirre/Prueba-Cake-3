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
                ['action' => 'delete', $header->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $header->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Headers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="headers form large-9 medium-8 columns content">
    <?= $this->Form->create($header) ?>
    <fieldset>
        <legend><?= __('Edit Header') ?></legend>
        <?php
            echo $this->Form->input('client_id', ['options' => $clients]);
            echo $this->Form->input('payment', ['options' =>$this->Global->typePayments('list')]);
            echo $this->Form->input('total');
            echo $this->Form->input('emmision');
        ?>
    </fieldset>
    <fieldset>
        <table style="width:100%" id="add-corpse">
          <tr>
            <th>N°</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Mesure</th>
            <th>Semi-Total</th>
          </tr>
          <?php $i = 1; foreach($header->corpses as $corpse){ ?>
          <tr>
            <td><?php echo $i?></td>
            <td><?php echo $this->Form->input('product_id', [
                'label' => false, 'options' => $products, 'default' => $corpse->product_id]); ?>
            </td>
            <td><?php echo $this->Form->input('quantity', ['label' => false, 'default' => $corpse->quantity]); ?></td>
            <td><?php echo $this->Form->input('mesure_id', ['label' => false, 'options' => $mesures , 'default' => $corpse->mesure_id]); ?></td>
            <td><?php echo $this->Form->input('subtotal', ['label' => false, 'default' => $corpse->subtotal]); ?></td>
          </tr>
          <?php $i++; } ?>
        </table>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
