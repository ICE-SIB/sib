<?php $this->Html->addCrumb(__('Users')); ?>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
  			<div class="panel-heading">
   				<h1 class="panel-title"><?= __('Menu') ?></h1>
  			</div>
  			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation"><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
				</ul>
 			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
    			<h1 class="panel-title"><?= __('Users') ?></h3>
  			</div>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
					    <tr>
					    	<th><?= $this->Paginator->sort('first_name'); ?></th>
					    	<th><?= $this->Paginator->sort('last_name'); ?></th>
					    	<th><?= $this->Paginator->sort('username'); ?></th>
					        <th><?= $this->Paginator->sort('role'); ?></th>
					        <th><?= __('Actions'); ?></th>
					    </tr>
					</thead>
					<tbody>
					    <?php foreach ($users as $user): ?>
					    <tr>
					        <td><?= h($user->first_name) ?></td>
					        <td><?= h($user->last_name) ?></td>
					        <td><?= h($user->username) ?></td>
					        <td><?= h($user->roleLabel) ?></td>
					        <td>
					            <?= $this->Html->link('', ['action' => 'view', $user->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
					            <?= $this->Html->link('', ['action' => 'edit', $user->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
					        </td>
					    </tr>
					</tbody>
				    <?php endforeach; ?>
				</table>			
			</div>
			<div class="panel-footer">			
				<p class="text-center"><?= $this->Paginator->counter() ?></p>
			</div>
		</div>
		<div class="text-center">
			<ul class="pagination">
				<?php
				echo $this->Paginator->prev('«');
				echo $this->Paginator->numbers(['before' => '', 'after' => '']);
				echo $this->Paginator->next('»');
				?>
			</ul>
		</div>
	</div>	
</div>