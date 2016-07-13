<?php
$this->Html->addCrumb(__('Users'), ['action' => 'index']);
$this->Html->addCrumb(__('New User'));
?>
<h1><?= __('New User') ?></h1>
<?= $this->Form->create($user) ?>
<div class="form-group">
	<?= $this->Form->label('User.role') ?>
	<?= $this->Form->select('role', $choices, ['default' => 'e']) ?>
</div>
<?php
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->submit(__('Submit'));
echo $this->Form->end();
?>
