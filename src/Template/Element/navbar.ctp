<nav class="navbar navbar-inverse navbar-static-top">
	<div class="container">
	    <div class="navbar-header">
	    	<?= $this->Html->link(__('Inventory Management System'), ['controller' => 'Pages', 'action' => 'display', 'home'], ['class' => 'navbar-brand']) ?>
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
        		<span class="icon-bar"></span>
    			<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse">
	      	<ul class="nav navbar-nav navbar-right">
	        	<?php
	        	$manual = __('Manual');
	        	if ($user_username):
	        		$sign_out = __('Sign Out'); ?>
	        		<li><?= $this->Html->link($this->Html->icon('log-out') . " $sign_out", ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?></li>
	        	<?php endif; ?>
	        	<li><?= $this->Html->link($this->Html->icon('book') . " $manual", 'https://ice-sib.github.io/sib', ['escape' => false]) ?></li>
	      	</ul>
	      	<?php if ($user_username): ?>
	      		<p class="navbar-text navbar-right"><?= $this->Html->icon('user') . " $user_fullname ($user_username)" ?></p>
	      	<?php endif; ?>
    	</div>
    </div>
</nav>