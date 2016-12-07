<?php $this->Html->addCrumb(__('Withdrawals'), ['action' => 'index']); ?>
<?php $this->Html->addCrumb(__('New Withdrawal')); ?>
<?= $this->Form->create($withdrawal); ?>
<h1><?= __('New Withdrawal') ?></h1>   
<?php   
echo $this->Form->input('inventory_id', ['label' => __('Inventory'), 'options' => $inventories]);
echo $this->Form->input('responsible');
echo $this->Form->input('quantity');
echo $this->Form->button(__("Submit"), ['class' => 'btn-primary btn-block']);
echo $this->Form->end();
?>
