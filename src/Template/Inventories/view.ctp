<?php $this->Html->addCrumb(__('Inventories'), ['action' => 'index']); ?>
<?php $this->Html->addCrumb(h($inventory->title)); ?>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
  			<div class="panel-heading">
   				<h1 class="panel-title"><?= __('Menu') ?></h1>
  			</div>
  			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked">
					<li><?= $this->Html->link(__('Edit Inventory'), ['action' => 'edit', $inventory->id]) ?> </li>
				</ul>
 			</div>
		</div>
	</div>
	<div class="col-md-9">
		<h1><?= h($inventory->title) ?></h1>
	    <table class="table table-hover">
	    	<tr>
            	<th><?= __('Material') ?></th>
            	<td><?= $inventory->has('material') ? $this->Html->link($inventory->material->name, ['controller' => 'Materials', 'action' => 'view', $inventory->material->id]) : '' ?></td>
	        </tr>
	        <tr>
	            <th><?= __('Warehouse') ?></th>
	            <td><?= $inventory->has('warehouse') ? $this->Html->link($inventory->warehouse->project_name, ['controller' => 'Warehouses', 'action' => 'view', $inventory->warehouse->id]) : '' ?></td>
	        </tr>
	        <tr>
	            <th><?= __('Stock') ?></th>
	            <td><?= $this->Number->format($inventory->stock) ?></td>
	        </tr>
	        <tr>
	            <th><?= __('Area') ?></th>
	            <td><?= $this->Number->format($inventory->area) ?></td>
	        </tr>
	        <tr>
	            <th><?= __('Shelf') ?></th>
	            <td><?= $this->Number->format($inventory->shelf) ?></td>
	        </tr>
	        <tr>
	            <th><?= __('Body') ?></th>
	            <td><?= $this->Number->format($inventory->body) ?></td>
	        </tr>
	        <tr>
	            <th><?= __('Side') ?></th>
	            <td><?= $this->Number->format($inventory->side) ?></td>
	        </tr>
	        <tr>
	            <th><?= __('Platter') ?></th>
	            <td><?= $this->Number->format($inventory->platter) ?></td>
	        </tr>
	    </table>
	    <h4><?= __('Additional Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($inventory->additional_notes)); ?>
	</div>
</div>