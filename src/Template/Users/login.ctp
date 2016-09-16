<?= $this->Form->create() ?>
<?= $this->Html->image('ice_logo.png', ['alt' => 'logo', 'class' => 'center-block img-responsive img-rounded', 'width' => 256]) ?>
<h1 class="text-center"><?= __('Sign In') ?></h1>
<?php
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->button(__('Sign In'), ['class' => 'btn-primary btn-block']);
echo $this->Form->end();
?>