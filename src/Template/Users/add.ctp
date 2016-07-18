<?php
$this->Html->addCrumb(__('Users'), ['action' => 'index']);
$this->Html->addCrumb(__('New User'));
echo $this->Form->create($user);
?>
<h1><?= __('New User') ?></h1>   
<?php
echo $this->Form->input('role', ['options' => $available_roles, 'default' => 'e']);
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->button(__("Submit"), ['class' => 'btn-primary btn-block']);
echo $this->Form->end();
?>
