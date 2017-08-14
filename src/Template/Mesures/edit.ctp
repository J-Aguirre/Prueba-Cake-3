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
                ['action' => 'delete', $mesure->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mesure->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mesures'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mesures form large-9 medium-8 columns content">
    <?= $this->Form->create($mesure) ?>
    <fieldset>
        <legend><?= __('Edit Mesure') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('state', ['options' => $this->Global->stateDescriptor('list')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
