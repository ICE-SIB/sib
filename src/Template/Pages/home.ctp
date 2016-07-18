<div class="jumbotron">
	<h1 class="text-center"><?= __('Welcome, {0}', $user_fullname) ?></h1>
	<hr>
	<div class="btn-group btn-group-justified" role="group" aria-label="...">
		<?php
		echo $this->Html->link(__('Warehouses'), ['controller' => 'Warehouses'], ['class' => 'btn btn-default']);
		echo $this->Html->link(__('Materials'), ['controller' => 'Materials'], ['class' => 'btn btn-default']);
		echo $this->Html->link(__('Machines'), ['controller' => 'Machines'], ['class' => 'btn btn-default']);
		?>
	</div>
	<div class="btn-group btn-group-justified" role="group" aria-label="...">
		<?php
		echo $this->Html->link(__('Inventories'), ['controller' => 'Inventories'], ['class' => 'btn btn-default']);
		echo $this->Html->link(__('Deposits'), ['controller' => 'Deposits'], ['class' => 'btn btn-default']);
		echo $this->Html->link(__('Withdrawals'), ['controller' => 'Withdrawals'], ['class' => 'btn btn-default']);
		echo $this->Html->link(__('Machine Deployments'), ['controller' => 'MachineDeployments'], ['class' => 'btn btn-default']);
		?>
	</div>
</div>