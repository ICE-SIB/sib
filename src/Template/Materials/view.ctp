<?php $this->Html->addCrumb(__('Warehouses'), ['action' => 'index']); ?>
<?php $this->Html->addCrumb(h($material->name)); ?>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
  			<div class="panel-heading">
   				<h1 class="panel-title"><?= __('Menu') ?></h1>
  			</div>
  			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?= $this->Html->link(__('Edit Material'), ['action' => 'edit', $material->id]) ?> </li>
					<li><?= $this->Form->postLink(__('Delete Material'), ['action' => 'delete', $material->id], ['confirm' => __('Are you sure you want to delete # {0}?', $material->id)]) ?> </li>
				</ul>
 			</div>
		</div>
	</div>
	<div class="col-md-9">
		<h1><?= h($material->name) ?></h1>
	    <table class="table table-hover">
	    	<tr>
            	<th><?= __('Name') ?></th>
            	<td><?= h($material->name) ?></td>
	        </tr>
	        <tr>
	            <th><?= __('Unit') ?></th>
	            <td><?= $material->has('unit') ? $material->unit->symbol : '' ?></td>
	        </tr>
	        <tr>
	            <th><?= __('Code') ?></th>
	            <td><?= h($material->code) ?></td>
	        </tr>
	    </table>
	</div>
</div>