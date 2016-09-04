<?php $this->Html->addCrumb(__('Materials')); ?>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
  			<div class="panel-heading">
   				<h1 class="panel-title"><?= __('Menu') ?></h1>
  			</div>
  			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation"><?= $this->Html->link(__('New Material'), ['action' => 'add']) ?></li>
				</ul>
 			</div>
		</div>
	</div>
	<div class="col-md-9">
		<h1><?= __('Materials') ?></h1>
		<div class="panel panel-default">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
					    <tr>
			                <th><?= $this->Paginator->sort('code') ?></th>
			                <th><?= $this->Paginator->sort('name') ?></th>
			                <th><?= $this->Paginator->sort('unit_id') ?></th>
                			<th class="actions"><?= __('Actions') ?></th>
					    </tr>
					</thead>
					<tbody>
					    <?php foreach ($materials as $material): ?>
					    <tr>
			                <td><?= h($material->code) ?></td>
			                <td><?= h($material->name) ?></td>
			                <td><?= $material->has('unit') ? $material->unit->symbol : '' ?></td>
			                <td class="actions">
			                    <?= $this->Html->link('', ['action' => 'view', $material->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
					            <?= $this->Html->link('', ['action' => 'edit', $material->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
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