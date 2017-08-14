<?php
/**
  * @var \App\View\AppView $this
  */
$i = 0;
?>

<div style="display:none;">
    <?php echo $this->Form->input('product_id', ['label' => false, 'options' => $products]);?>
    <?php echo $this->Form->input('mesure_id', ['label' => false, 'options' => $mesures]);?>
</div>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Headers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<?= $this->Form->create($header) ?>
<div class="headers form large-9 medium-8 columns content">
    <fieldset>
        <legend><?= __('Add Header') ?></legend>
        <?php
            echo $this->Form->input('Headers.client_id', ['options' => $clients]);
            echo $this->Form->input('payment', ['options' => $this->Global->typePayments('list')]);
            echo $this->Form->input('total');
            echo $this->Form->input('emmision');
        ?>
    </fieldset>
    <!-- boton submit -->
</div>
<div class="headers form large-9 medium-8 columns content">
    <fieldset>
        <button type="button" id="add-corpse-button">Add Corpse</button>
        <legend><?= __('Detail') ?></legend>
        <table style="width:100%" id="add-corpse">
          <tr>
            <th>N°</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Mesure</th>
            <th>Semi-Total</th>
          </tr>
        </table>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
</div>
<?= $this->Form->end() ?>
       
<script>
    $(document).ready(function(){
        var id = 0;
        $("#add-corpse-button").click(function(){
            var n = id+1; n = '<tr><td>'+n+'</td>';
            var product = '<td><select name="Corpses['+id+'][product_id]" id="corpses-'+id+'-product-id"></select></td>';
            var quantity = '<td><input type="text" name="Corpses['+id+'][quantity]" id="corpses-'+id+'-quantity"></td>';
            var mesure = '<td><select name="Corpses['+id+'][mesure_id]" id="corpses-'+id+'-mesure-id"></select></td>';
            var subtotal = '<td><input type="text" name="Corpses['+id+'][subtotal]" id="corpses-'+id+'-subtotal"></td></tr>';
            var complete = n+product+quantity+mesure+subtotal;
            //console.log(complete);
            $("#add-corpse").append(complete);
            $("#corpses-"+id+"-product-id").html($("#product-id").html());
            $("#corpses-"+id+"-mesure-id").html($("#mesure-id").html());
            /*var $products = $("#corpses-0-product-id > option").clone();
            $('#corpses-'+id+'-product-id').append($products);
            var $mesures = $("#corpses-0-mesure-id > option").clone();
            $('#corpses-'+id+'-mesure-id').append($mesures);*/
            id += 1;
        });
    });
</script> 

