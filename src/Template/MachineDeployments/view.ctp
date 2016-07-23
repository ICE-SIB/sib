<?php
$this->Html->addCrumb(__('Machine Deployment'), ['action' => 'index']);
$this->Html->addCrumb(h($machineDeployment->title));
?>
<h1><?= h($machineDeployment->title) ?></h1>
<table class="table table-hover">
	<tr>
    	<th><?= __('User') ?></th>
    	<td><?= $machineDeployment->has('user') ? $this->Html->link($machineDeployment->user->full_name, ['controller' => 'Users', 'action' => 'view', $machineDeployment->user->id]) : '' ?></td>
    </tr>
    <tr>
        <th><?= __('Machine') ?></th>
        <td><?= $machineDeployment->has('machine') ? $this->Html->link($machineDeployment->machine->name, ['controller' => 'Machines', 'action' => 'view', $machineDeployment->machine->id]) : '' ?></td>
    </tr>
    <tr>
        <th><?= __('Origin') ?></th>
        <td><?= $machineDeployment->has('origin') ? $this->Html->link($machineDeployment->origin->project_name, ['controller' => 'Warehouses', 'action' => 'view', $machineDeployment->origin->id]) : '' ?></td>
    </tr>
    <tr>
        <th><?= __('Destination') ?></th>
        <td><?= $machineDeployment->has('destination') ? $this->Html->link($machineDeployment->destination->project_name, ['controller' => 'Warehouses', 'action' => 'view', $machineDeployment->destination->id]) : '' ?></td>
    </tr>
    <tr>
        <th><?= __('Responsible') ?></th>
        <td><?= h($machineDeployment->responsible) ?></td>
    </tr>
    <tr>
        <th><?= __('Management Center') ?></th>
        <td><?= h($machineDeployment->management_center) ?></td>
    </tr>
    <tr>
        <th><?= __('Rate Type') ?></th>
        <td><?= h($machineDeployment->rate_type_label) ?></td>
    </tr>
    <tr>
        <th><?= __('Service Order') ?></th>
        <td><?= h($machineDeployment->service_order) ?></td>
    </tr>
    <tr>
        <th><?= __('Datetime') ?></th>
        <td><?= h($machineDeployment->datetime) ?></td>
    </tr>
</table>