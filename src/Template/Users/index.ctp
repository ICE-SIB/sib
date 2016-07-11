<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Menú</h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation"><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
                    <li class="nav-divider"></li>
                    <li role="presentation">Add relevant links here</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
    	<?php $this->Html->addCrumb(__('Home'), ['controller' => 'Users', 'action' => 'main-menu']); ?>
    	<?php $this->Html->addCrumb(__('Users')); ?>
    	<?= $this->Html->getCrumbList(['class' => 'breadcrumb', 'lastClass' => 'active']) ?>   
        <h1>Users</h1>
        <div class="panel panel-default">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th><?= $this->Paginator->sort('first_name') ?></th>
                        <th><?= $this->Paginator->sort('last_name') ?></th>
                        <th><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($users as $user): ?>
                    <tr>		                
                        <td><?= h($user->first_name) ?></td>
                        <td><?= h($user->last_name) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="panel-footer">
                <div class="text-center">
                    <small><?= $this->Paginator->counter() ?></small>
                </div>
            </div>
        </div>
        <div class="text-center">
            <nav>
                <ul class="pager">		            
                    <?= $this->Paginator->prev(__('Previous')) ?>
                    <?= $this->Paginator->next(__('Next')) ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
