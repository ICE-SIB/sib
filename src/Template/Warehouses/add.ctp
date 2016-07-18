<?php $this->Html->addCrumb(__('Warehouses'), ['action' => 'index']); ?>
<?php $this->Html->addCrumb(__('New Warehouse')); ?>
<?= $this->Form->create($warehouse); ?>
	<h1><?= __('New Warehouse') ?></h1>   
    <?= $this->Form->input('project_name') ?>
<?= $this->Form->button(__("Submit"), ['class' => 'btn-primary btn-block']); ?>
<?= $this->Form->end() ?>
