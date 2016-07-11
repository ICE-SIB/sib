<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Menú</h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation"><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?></li>
                    <li role="presentation"><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?></li>
                </ul>
            </div>
        </div>
	</div>
	<div class="col-md-9">
		<?php $this->Html->addCrumb(__('Home'), ['controller' => 'Users', 'action' => 'main-menu']); ?>
    	<?php $this->Html->addCrumb(__('Users'), ['action' => 'index']); ?>
    	<?php $this->Html->addCrumb(__('{0} {1}', h($user->first_name), h($user->last_name))); ?>
    	<?= $this->Html->getCrumbList(['class' => 'breadcrumb', 'lastClass' => 'active']) ?>
		<h1><?= h("$user->first_name $user->last_name") ?></h1>
		<div class="panel panel-default">
            <div class="table-responsive">
                <table class="table">
                	<tr>
            			<th><?= __('First Name') ?></th>
            			<td><?= h($user->first_name) ?></td>
       				</tr>
       				<tr>
            			<th><?= __('Last Name') ?></th>
            			<td><?= h($user->last_name) ?></td>
        			</tr>
        			<tr>
           				<th><?= __('Username') ?></th>
            			<td><?= h($user->username) ?></td>
        			</tr>
        			<tr>
	                	<th><?= __('Role') ?></th>
	            		<td><?= h($user->role) ?></td>
	            	</tr>
                </table>
            </div>
        </div>
	</div>
</div>