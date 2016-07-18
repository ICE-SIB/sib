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
	            <th><?= __('Unit Type') ?></th>
	            <td><?= h($material->unit_type) ?></td>
	        </tr>
	        <tr>
	            <th><?= __('Id') ?></th>
	            <td><?= $this->Number->format($material->id) ?></td>
	        </tr>
	        <tr>
	            <th><?= __('Code') ?></th>
	            <td><?= $this->Number->format($material->code) ?></td>
	        </tr>
	    </table>
	</div>
</div>