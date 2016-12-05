<?php $this->Html->addCrumb(__('Inventories'), ['action' => 'index']); ?>
<?php $this->Html->addCrumb(__('New Inventory')); ?>
<?= $this->Form->create($inventory); ?>
<h1><?= __('New Inventory') ?></h1>   
<?php   
echo $this->Form->input('material_id', ['options' => $materials]);
echo $this->Form->input('warehouse_id', ['options' => $warehouses]);
echo $this->Form->input('area');
echo $this->Form->input('shelf');
echo $this->Form->input('body');
echo $this->Form->input('side');
echo $this->Form->input('platter');
echo $this->Form->input('additional_notes');
echo $this->Form->button(__("Submit"), ['class' => 'btn-primary btn-block']);
echo $this->Form->end();
?>
