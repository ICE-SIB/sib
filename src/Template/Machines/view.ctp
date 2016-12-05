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
            	<th><?= __('Warehouse') ?></th>
            	<td><?= $machine->has('warehouse') ? $this->Html->link($machine->warehouse->project_name, ['controller' => 'Warehouses', 'action' => 'view', $machine->warehouse->id]) : '' ?></td>
	        </tr>
	        <tr>
	            <th><?= __('Name') ?></th>
	            <td><?= h($machine->name) ?></td>
	        </tr>
	        <tr>
	            <th><?= __('Asset Number') ?></th>
	            <td><?= h($machine->asset_number) ?></td>
	        </tr>
	        <tr>
	            <th><?= __('Rate Type') ?></th>
	            <td><?= h($machine->rate_type_label) ?></td>
	        </tr>        
	        <tr>
	            <th><?= __('Is Active') ?></th>
	            <td><?= $machine->is_active ? __('Yes') : __('No'); ?></td>
	        </tr>
	    </table>
		<h4><?= __('Description') ?></h4>
		<?= $this->Text->autoParagraph(h($machine->description)); ?>
		
		<h4><?= __('Related Machine Deployments') ?></h4>
        <?php if (!empty($machine->machine_deployments)): ?>
        <table>
            <tr>
                <th><?= __('User Id') ?></th>
                <th><?= __('Machine Id') ?></th>
                <th><?= __('From Warehouse') ?></th>
                <th><?= __('To Warehouse') ?></th>
                <th><?= __('Responsible') ?></th>
                <th><?= __('Management Center') ?></th>
                <th><?= __('Service Order') ?></th>
                <th><?= __('Datetime') ?></th>
            </tr>
            <?php foreach ($machine->machine_deployments as $machineDeployments): ?>
            <tr>
                <td><?= h($machineDeployments->user_id) ?></td>
                <td><?= h($machineDeployments->machine_id) ?></td>
                <td><?= h($machineDeployments->from_warehouse) ?></td>
                <td><?= h($machineDeployments->to_warehouse) ?></td>
                <td><?= h($machineDeployments->responsible) ?></td>
                <td><?= h($machineDeployments->management_center) ?></td>
                <td><?= h($machineDeployments->service_order) ?></td>
                <td><?= h($machineDeployments->datetime) ?></td>               
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
	</div>
</div>