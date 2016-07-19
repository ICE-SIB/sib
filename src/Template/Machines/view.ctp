<?php $this->Html->addCrumb(__('Machines'), ['action' => 'index']); ?>
<?php $this->Html->addCrumb(h($machine->name)); ?>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
  			<div class="panel-heading">
   				<h1 class="panel-title"><?= __('Menu') ?></h1>
  			</div>
  			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?= $this->Html->link(__('Edit Machine'), ['action' => 'edit', $machine->id]) ?> </li>
				</ul>
 			</div>
		</div>
	</div>
	<div class="col-md-9">
		<h1><?= h($machine->name) ?></h1>
	    <table class="table table-hover">    	
	        <tr>
	            <th><?= __('Name') ?></th>
	            <td><?= h($machine->name) ?></td>
	        </tr>
	        <tr>
	            <th><?= __('Code') ?></th>
	            <td><?= h($machine->code) ?></td>
	        </tr>
	        <tr>
            	<th><?= __('Warehouse') ?></th>
            	<td><?= $machine->has('warehouse') ? $this->Html->link($machine->warehouse->project_name, ['controller' => 'Warehouses', 'action' => 'view', $machine->warehouse->id]) : '' ?></td>
	        </tr>
	        <tr>
	            <th><?= __('Is Active') ?></th>
	            <td><?= $machine->is_active ? __('Yes') : __('No'); ?></td>
	        </tr> 
	    </table>
		<h4><?= __('Description') ?></h4>
		<?= $this->Text->autoParagraph(h($machine->description)); ?>
	</div>
</div>