<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= __('Menu') ?></h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation"><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?></li>
                    <?php if ($user_id !== $user->id): ?>
                    	<li role="presentation"><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete {0} {1}?', $user->first_name, $user->last_name)]) ?></li>
                	<?php endif; ?>
                </ul>
            </div>
        </div>
	</div>
	<div class="col-md-9">
    	<?php
    	$this->Html->addCrumb(__('Users'), ['action' => 'index']);
    	$this->Html->addCrumb(h($user->full_name));
    	?>
		<h1><?= h($user->full_name) ?></h1>
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
	            		<td><?= h($user->role_label) ?></td>
	            	</tr>
                </table>
            </div>
        </div>
	</div>
</div>