<?php $this->Html->addCrumb(__('Warehouses')); ?>
<div class="row">
<?php if ($user_role === 'a'): ?>
	<div class="col-md-3">
		<div class="panel panel-default">
  			<div class="panel-heading">
   				<h1 class="panel-title"><?= __('Menu') ?></h1>
  			</div>
  			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation"><?= $this->Html->link(__('New Warehouse'), ['action' => 'add']) ?></li>
				</ul>
 			</div>
		</div>
	</div>
	<div class="col-md-9">
<?php else: ?>
	<div class="col-md-12">
<?php endif; ?>
		<div class="panel panel-default">
			<div class="panel-heading">
    			<h1 class="panel-title"><?= __('Warehouses') ?></h3>
  			</div>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
					    <tr>
                			<th><?= $this->Paginator->sort('project_name') ?></th>
                			<th><?= __('Actions') ?></th>
					    </tr>
					</thead>
					<tbody>
					    <?php foreach ($warehouses as $warehouse): ?>
					    <tr>
                			<td><?= h($warehouse->project_name) ?></td>
                			<td>
                    			<?= $this->Html->link('', ['action' => 'view', $warehouse->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
					            <?php if ($user_role === 'a'): ?>
					            	<?= $this->Html->link('', ['action' => 'edit', $warehouse->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
					            	<?= $this->Form->postLink('', ['action' => 'delete', $warehouse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $warehouse->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                				<?php endif; ?>
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
