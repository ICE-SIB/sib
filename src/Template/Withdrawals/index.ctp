<?php $this->Html->addCrumb(__('Withdrawals')); ?>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
  			<div class="panel-heading">
   				<h1 class="panel-title"><?= __('Menu') ?></h1>
  			</div>
  			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation"><?= $this->Html->link(__('New Withdrawal'), ['action' => 'add']) ?></li>
				</ul>
 			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
    			<h1 class="panel-title"><?= __('Withdrawals') ?></h3>
  			</div>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
					    <tr>
			                <th><?= $this->Paginator->sort('user_id') ?></th>
			                <th><?= $this->Paginator->sort('inventory_id') ?></th>
			                <th><?= $this->Paginator->sort('responsible') ?></th>
			                <th><?= $this->Paginator->sort('quantity') ?></th>
			                <th><?= $this->Paginator->sort('datetime') ?></th>
					    </tr>
					</thead>
					<tbody>
					    <?php foreach ($withdrawals as $withdrawal): ?>
					    <tr>
			                <td><?= $withdrawal->has('user') ? $this->Html->link($withdrawal->user->full_name, ['controller' => 'Users', 'action' => 'view', $withdrawal->user->id]) : '' ?></td>
			                <td><?= $withdrawal->has('inventory') ? $this->Html->link($withdrawal->inventory->title, ['controller' => 'Inventories', 'action' => 'view', $withdrawal->inventory->id]) : '' ?></td>
			                <td><?= h($withdrawal->responsible) ?></td>
			                <td><?= $this->Number->format($withdrawal->quantity) ?></td>
			                <td><?= h($withdrawal->datetime) ?></td>
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