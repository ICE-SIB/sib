<?php $this->Html->addCrumb(__('Machines'), ['action' => 'index']); ?>
<?php $this->Html->addCrumb(h($machine->name), ['action' => 'view', $machine->id]); ?>
<?php $this->Html->addCrumb(__('Edit Machine')); ?>
<?= $this->Form->create($machine) ?>
<h1><?= __('Edit Machine') ?></h1>
<?php
echo $this->Form->input('name');
echo $this->Form->input('asset_number');
echo $this->Form->input('rate_type', ['options' => $available_rate_types]);
echo $this->Form->input('is_active');
echo $this->Form->input('description');
echo $this->Form->button(__("Submit"), ['class' => 'btn-primary btn-block']);
echo $this->Form->end();
?>
