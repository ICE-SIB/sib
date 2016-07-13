<?php
$this->Html->addCrumb(__('Users'), ['action' => 'index']);
$this->Html->addCrumb(h($user->full_name), ['action' => 'view', h($user->id)]);
$this->Html->addCrumb(__('Edit User'));
?>
<h1><?= __('Edit User') ?></h1>
<?= $this->Form->create($user) ?>
<div class="form-group">
	<?= $this->Form->label('User.role') ?>
	<?= $this->Form->select('role', $choices) ?>
</div>
<?php
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('username', ['disabled' => true]);
echo $this->Form->input('password');
echo $this->Form->submit(__('Submit'));
echo $this->Form->end();
?>
