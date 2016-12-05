<?php $this->Html->addCrumb(__('Machine Deployments')); ?>
<div class="row">
<?php if ($user_role !== 'e'): ?>
	<div class="col-md-3">
		<div class="panel panel-default">
  			<div class="panel-heading">
   				<h1 class="panel-title"><?= __('Menu') ?></h1>
  			</div>
  			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation"><?= $this->Html->link(__('New Machine Deployment'), ['action' => 'add']) ?></li>
				</ul>
 			</div>
		</div>
	</div>
	<div class="col-md-9">
<?php else: ?>
	<div class="col-md-12">
<?php endif; ?>
		<div class="panel panel-default">
			<div class="panel-heading">
    			<h1 class="panel-title"><?= __('Machine Deployments') ?></h3>
  			</div>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
					    <tr>
				            <th><?= $this->Paginator->sort('user_id') ?></th>
				            <th><?= $this->Paginator->sort('machine_id') ?></th>
				            <th><?= $this->Paginator->sort('from_warehouse') ?></th>
				            <th><?= $this->Paginator->sort('to_warehouse') ?></th>
				            <th><?= $this->Paginator->sort('responsible') ?></th>
				            <th><?= $this->Paginator->sort('datetime') ?></th>
                			<th><?= __('Actions') ?></th>
					    </tr>
					</thead>
					<tbody>
					    <?php foreach ($machineDeployments as $machineDeployment): ?>
					    <tr>
			                <td><?= $machineDeployment->has('user') ? $this->Html->link($machineDeployment->user->full_name, ['controller' => 'Users', 'action' => 'view', $machineDeployment->user->id]) : '' ?></td>
			                <td><?= $machineDeployment->has('machine') ? $this->Html->link($machineDeployment->machine->name, ['controller' => 'Machines', 'action' => 'view', $machineDeployment->machine->id]) : '' ?></td>
			                <td><?= $machineDeployment->has('origin') ? $this->Html->link($machineDeployment->origin->project_name, ['controller' => 'Warehouses', 'action' => 'view', $machineDeployment->origin->id]) : '' ?></td>
			                <td><?= $machineDeployment->has('destination') ? $this->Html->link($machineDeployment->destination->project_name, ['controller' => 'Warehouses', 'action' => 'view', $machineDeployment->destination->id]) : '' ?></td>
			                <td><?= h($machineDeployment->responsible) ?></td>
			                <td><?= h($machineDeployment->datetime) ?></td>
					        <td>
					            <?= $this->Html->link('', ['action' => 'view', $machineDeployment->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
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