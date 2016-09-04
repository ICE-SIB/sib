<?php
$this->Html->addCrumb(__('Machine Deployments'), ['action' => 'index']);
$this->Html->addCrumb(__('New Machine Deployment'));
echo $this->Form->create($machineDeployment);
?>
<h1><?= __('New Machine Deployment') ?></h1>   
<?php   
echo $this->Form->input('machine_id', ['options' => $machines]);
echo $this->Form->input('to_warehouse', ['options' => $destinations]);
echo $this->Form->input('responsible');
echo $this->Form->input('management_center');
echo $this->Form->input('service_order');
echo $this->Form->button(__("Submit"), ['class' => 'btn-primary btn-block']);
echo $this->Form->end();
?>
