<?php $this->Html->addCrumb(__('Materials'), ['action' => 'index']); ?>
<?php $this->Html->addCrumb(__('New Material')); ?>
<?= $this->Form->create($material); ?>
<h1><?= __('New Material') ?></h1>   
<?php   
echo $this->Form->input('code');
echo $this->Form->input('name');
echo $this->Form->input('unit_id', ['options' => $units]);
echo $this->Form->button(__("Submit"), ['class' => 'btn-primary btn-block']);
echo $this->Form->end();
?>
