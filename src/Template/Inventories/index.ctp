<?php $this->Html->addCrumb(__('Inventories')); ?>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
  			<div class="panel-heading">
   				<h1 class="panel-title"><?= __('Menu') ?></h1>
  			</div>
  			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation"><?= $this->Html->link(__('New Inventory'), ['action' => 'add']) ?></li>
				</ul>
 			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
    			<h1 class="panel-title"><?= __('Inventories') ?></h3>
  			</div>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
					    <tr>
			                <th><?= $this->Paginator->sort('material_id') ?></th>
			                <th><?= $this->Paginator->sort('warehouse_id') ?></th>
			                <th><?= $this->Paginator->sort('stock') ?></th>
			                <th><?= $this->Paginator->sort('area') ?></th>
			                <th><?= $this->Paginator->sort('shelf') ?></th>
			                <th><?= $this->Paginator->sort('body') ?></th>
			                <th><?= $this->Paginator->sort('side') ?></th>
			                <th><?= $this->Paginator->sort('platter') ?></th>
                			<th class="actions"><?= __('Actions') ?></th>
					    </tr>
					</thead>
					<tbody>
					    <?php foreach ($inventories as $inventory): ?>
					    <tr>
			                <td><?= $inventory->has('material') ? $this->Html->link($inventory->material->name, ['controller' => 'Materials', 'action' => 'view', $inventory->material->id]) : '' ?></td>
			                <td><?= $inventory->has('warehouse') ? $this->Html->link($inventory->warehouse->project_name, ['controller' => 'Warehouses', 'action' => 'view', $inventory->warehouse->id]) : '' ?></td>
			                <td><?= $this->Number->format($inventory->stock) ?></td>
			                <td><?= h($inventory->area) ?></td>
			                <td><?= h($inventory->shelf) ?></td>
			                <td><?= h($inventory->body) ?></td>
			                <td><?= h($inventory->side) ?></td>
			                <td><?= h($inventory->platter) ?></td>
					        <td>
					            <?= $this->Html->link('', ['action' => 'view', $inventory->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
					            <?= $this->Html->link('', ['action' => 'edit', $inventory->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
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