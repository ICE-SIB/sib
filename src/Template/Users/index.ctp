<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= __('Menu') ?></h3>
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
    	<?php $this->Html->addCrumb(__('Users')); ?>  
        <h1><?= __('Users') ?></h1>
        <div class="panel panel-default">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th><?= $this->Paginator->sort('first_name') ?></th>
                        <th><?= $this->Paginator->sort('last_name') ?></th>
                        <th><?= $this->Paginator->sort('username') ?></th>
                        <th><?= $this->Paginator->sort('role') ?></th>
                        <th><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($users as $user): ?>
                    <tr>		                
                        <td><?= h($user->first_name) ?></td>
                        <td><?= h($user->last_name) ?></td>
                        <td><?= h($user->username) ?></td>
                        <td><?= h($user->role_label) ?></td>                   
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                            <?php if ($user_id !== $user->id): ?>
                            	<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete {0} {1}?', $user->first_name, $user->last_name)]) ?>
                            <?php endif; ?>
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
