<h2 class="text-center"><?= __("Sign In") ?></h2>
<?php
echo $this->Form->create();
echo $this->Form->input('username');
echo $this->Form->input('password');	
echo $this->Form->submit(__('Sign In'));
echo $this->Form->end();
?>