<?php $this->Html->addCrumb(__('Machines')); ?>
<div class="row">
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
		<div class="panel panel-default">
			<div class="panel-heading">
    			<h1 class="panel-title"><?= __('Machines') ?></h3>
  			</div>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
					    <tr>
					    	<th><?= $this->Paginator->sort('name') ?></th>
					    	<th><?= $this->Paginator->sort('code') ?></th>
                			<th><?= $this->Paginator->sort('warehouse_id') ?></th>
                			<th><?= $this->Paginator->sort('is_active') ?></th>
                			<th><?= __('Actions') ?></th>
					    </tr>
					</thead>
					<tbody>
					    <?php foreach ($machines as $machine): ?>
					    <tr>
                			<td><?= h($machine->name) ?></td>
                			<td><?= h($machine->code) ?></td>	
                			<td><?= $machine->has('warehouse') ? $this->Html->link($machine->warehouse->project_name, ['controller' => 'Warehouses', 'action' => 'view', $machine->warehouse->id]) : '' ?></td>
					        <td><?= $machine->is_active ? __('Yes') : __('No'); ?></td>
					        <td>
					            <?= $this->Html->link('', ['action' => 'view', $machine->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
					            <?= $this->Html->link('', ['action' => 'edit', $machine->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
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