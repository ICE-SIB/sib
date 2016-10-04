<?php $this->Html->addCrumb(__('Machines')); ?>

<div class="row">

<?php if ($user_role !== 'e'): ?>
	<div class="col-md-3">
		<div class="panel panel-default">
  			<div class="panel-heading">
   				<h1 class="panel-title"><?= __('Menu') ?></h1>
  			</div>
  			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation"><?= $this->Html->link(__('New Machine'), ['action' => 'add']) ?></li>
				</ul>
 			</div>
		</div>
	</div>
	<div class="col-md-9">
<?php else: ?>
	<div class="col-md-12">
<?php endif; ?>

		<?= $this->Form->create() ?>
		<?= $this->Form->input('asset_number') ?>
		<?= $this->Form->input('q', ['label' => __('Name - Project')]) ?>
		<?= $this->Form->button(__('Search'), ['class' => 'btn-primary']) ?>
		<?= $this->Html->link(__('Reset'), ['action' => 'index']) ?>
		<?= $this->Form->end() ?>
		
		<br>

		<div class="panel panel-default">
			<div class="panel-heading">
    			<h1 class="panel-title"><?= __('Machines') ?></h3>
  			</div>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
					    <tr>
					    	<th><?= $this->Paginator->sort('warehouse_id') ?></th>
			                <th><?= $this->Paginator->sort('name') ?></th>
			                <th><?= $this->Paginator->sort('asset_number') ?></th>
			                <th><?= $this->Paginator->sort('rate_type') ?></th>
			                <th><?= $this->Paginator->sort('is_active') ?></th>
                			<th><?= __('Actions') ?></th>
					    </tr>
					</thead>
					<tbody>
					    <?php foreach ($machines as $machine): ?>
					    <tr>
			                <td><?= $machine->has('warehouse') ? $this->Html->link($machine->warehouse->project_name, ['controller' => 'Warehouses', 'action' => 'view', $machine->warehouse->id]) : '' ?></td>
			                <td><?= h($machine->name) ?></td>
			                <td><?= h($machine->asset_number) ?></td>
			                <td><?= h($machine->rate_type_label) ?></td>
					        <td><?= $machine->is_active ? __('Yes') : __('No'); ?></td>
					        <td>
					            <?= $this->Html->link('', ['action' => 'view', $machine->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
					            <?php if ($user_role !== 'e'): ?>
					            	<?= $this->Html->link('', ['action' => 'edit', $machine->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
					        	<?php endif; ?>
					        </td>
					    </tr>
					</tbody>
				    <?php endforeach; ?>
				</table>			
			</div>
			<div class="panel-footer">			
				<p class="text-center"><?= $this->Paginator->counter() ?></p>
			</div>
		</div>
		<div class="text-center">
			<ul class="pagination">
				<?php
				echo $this->Paginator->prev('«');
				echo $this->Paginator->numbers(['before' => '', 'after' => '']);
				echo $this->Paginator->next('»');
				?>
			</ul>
		</div>
	</div>	
</div>