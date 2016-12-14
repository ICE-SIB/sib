<?php $this->Html->addCrumb(__('Users'), ['action' => 'index']); ?>
<?php $this->Html->addCrumb(h($user->full_name)); ?>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
  			<div class="panel-heading">
   				<h1 class="panel-title"><?= __('Menu') ?></h1>
  			</div>
  			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
				</ul>
 			</div>
		</div>
	</div>
	<div class="col-md-9">
		<h1><?= h($user->full_name) ?></h1>
	    <table class="table table-hover">
	    	<tr>
	            <td><?= __('First Name') ?></td>
	            <td><?= h($user->first_name) ?></td>
	        </tr>
	        <tr>
	            <td><?= __('Last Name') ?></td>
	            <td><?= h($user->last_name) ?></td>
	        </tr>
	        <tr>
	            <td><?= __('Username') ?></td>
	            <td><?= h($user->username) ?></td>
	        </tr>
	        <tr>
	            <td><?= __('Role') ?></td>
	            <td><?= h($user->role_label) ?></td>
	        </tr>
	    </table>
	</div>
</div>
