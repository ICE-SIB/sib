<?php $this->Html->addCrumb(__('Users'), ['action' => 'index']); ?>
<?php $this->Html->addCrumb(h($user->full_name), ['action' => 'view', $user->id]); ?>
<?php $this->Html->addCrumb(__('Edit User')); ?>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
  			<div class="panel-heading">
   				<h1 class="panel-title"><?= __('Menu') ?></h1>
  			</div>
  			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?></li>
				</ul>
 			</div>
		</div>
	</div>
	<div class="col-md-9">
		<?= $this->Form->create($user) ?>
	    <h1><?= __('Edit User') ?></h1>
	    <div class="form-group">
			<?= $this->Form->label('role', __('Role')) ?>
	    	<?= $this->Form->select('role', $available_roles, ['default' => 'e']) ?>
	    </div>
	    <?php
	    echo $this->Form->input('first_name');
	    echo $this->Form->input('last_name');
	    echo $this->Form->input('username', ['disabled' => 'true']);
	    echo $this->Form->input('password');
		echo $this->Form->button(__("Submit"), ['class' => 'btn-primary btn-block']);
		echo $this->Form->end();
		?>
	</div>
</div>

