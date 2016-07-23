<?php $this->Html->addCrumb(__('Deposits')); ?>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
  			<div class="panel-heading">
   				<h1 class="panel-title"><?= __('Menu') ?></h1>
  			</div>
  			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation"><?= $this->Html->link(__('New Deposit'), ['action' => 'add']) ?></li>
				</ul>
 			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
    			<h1 class="panel-title"><?= __('Deposits') ?></h3>
  			</div>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
					    <tr>
			                <th><?= $this->Paginator->sort('user_id') ?></th>
			                <th><?= $this->Paginator->sort('inventory_id') ?></th>
			                <th><?= $this->Paginator->sort('receipt_number') ?></th>
			                <th><?= $this->Paginator->sort('quantity') ?></th>
			                <th><?= $this->Paginator->sort('datetime') ?></th>
					    </tr>
					</thead>
					<tbody>
					    <?php foreach ($deposits as $deposit): ?>
					    <tr>
			                <td><?= $deposit->has('user') ? $this->Html->link($deposit->user->full_name, ['controller' => 'Users', 'action' => 'view', $deposit->user->id]) : '' ?></td>
			                <td><?= $deposit->has('inventory') ? $this->Html->link($deposit->inventory->title, ['controller' => 'Inventories', 'action' => 'view', $deposit->inventory->id]) : '' ?></td>
			                <td><?= h($deposit->receipt_number) ?></td>
			                <td><?= $this->Number->format($deposit->quantity) ?></td>
			                <td><?= h($deposit->datetime) ?></td>
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