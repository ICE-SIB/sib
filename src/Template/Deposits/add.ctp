<?php $this->Html->addCrumb(__('Deposits'), ['action' => 'index']); ?>
<?php $this->Html->addCrumb(__('New Deposit')); ?>
<?= $this->Form->create($deposit); ?>
<h1><?= __('New Deposit') ?></h1>   
<?php   
echo $this->Form->input('inventory_id', ['label' => __('Inventory'), 'options' => $inventories]);
echo $this->Form->input('receipt_number');
echo $this->Form->input('quantity');
echo $this->Form->button(__("Submit"), ['class' => 'btn-primary btn-block']);
echo $this->Form->end();
?>
