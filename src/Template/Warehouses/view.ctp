<?php $this->Html->addCrumb(__('Warehouses'), ['action' => 'index']); ?>
<?php $this->Html->addCrumb(h($warehouse->project_name)); ?>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
  			<div class="panel-heading">
   				<h1 class="panel-title"><?= __('Menu') ?></h1>
  			</div>
  			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?= $this->Html->link(__('Edit Warehouse'), ['action' => 'edit', $warehouse->id]) ?> </li>
					<li><?= $this->Form->postLink(__('Delete Warehouse'), ['action' => 'delete', $warehouse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $warehouse->id)]) ?> </li>
				</ul>
 			</div>
		</div>
	</div>
	<div class="col-md-9">
		<h1><?= h($warehouse->project_name) ?></h1>
	    <table class="table table-hover">
	    	<tr>
	            <th><?= __('Project Name') ?></th>
            	<td><?= h($warehouse->project_name) ?></td>
	        </tr>
	    </table>
	</div>
</div>