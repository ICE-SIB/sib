<?php $this->Html->addCrumb(__('Warehouses'), ['action' => 'index']); ?>
<?php $this->Html->addCrumb(h($warehouse->project_name), ['action' => 'view', $warehouse->id]); ?>
<?php $this->Html->addCrumb(__('Edit Warehouse')); ?>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
  			<div class="panel-heading">
   				<h1 class="panel-title"><?= __('Menu') ?></h1>
  			</div>
  			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?= $this->Form->postLink(__('Delete Warehouse'), ['action' => 'delete', $warehouse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $warehouse->id)]) ?></li>
				</ul>
 			</div>
		</div>
	</div>
	<div class="col-md-9">
		<?= $this->Form->create($warehouse) ?>
	    <h1><?= __('Edit Warehouse') ?></h1>
	    <?= $this->Form->input('project_name') ?>
		<?= $this->Form->button(__("Submit"), ['class' => 'btn-primary btn-block']); ?>
		<?= $this->Form->end() ?>
	</div>
</div>

