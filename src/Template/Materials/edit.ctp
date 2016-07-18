<?php $this->Html->addCrumb(__('Materials'), ['action' => 'index']); ?>
<?php $this->Html->addCrumb(h($material->name), ['action' => 'view', $material->id]); ?>
<?php $this->Html->addCrumb(__('Edit Material')); ?>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
  			<div class="panel-heading">
   				<h1 class="panel-title"><?= __('Menu') ?></h1>
  			</div>
  			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?= $this->Form->postLink(__('Delete Material'), ['action' => 'delete', $material->id], ['confirm' => __('Are you sure you want to delete # {0}?', $material->id)]) ?></li>
				</ul>
 			</div>
		</div>
	</div>
	<div class="col-md-9">
		<?= $this->Form->create($material) ?>
	    <h1><?= __('Edit Material') ?></h1>
	    <?php
	    echo $this->Form->input('name');
    	echo $this->Form->input('code');       
        echo $this->Form->input('unit_type');
        echo $this->Form->button(__("Submit"), ['class' => 'btn-primary btn-block']);
		echo $this->Form->end();
		?>
	</div>
</div>
