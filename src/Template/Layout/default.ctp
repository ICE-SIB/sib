<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?></title>
    <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css('bootstrap.css');
    echo $this->Html->css('style.css');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
	<?= $this->element('navbar') ?>
	<div class="container">
		<?php
		echo $this->Flash->render();
		if ($user_username)
			echo $this->Html->getCrumbList(['lastClass' => 'active'], __('Home'));
    	echo $this->fetch('content');
    	?>
    </div>
    <?php
    echo $this->Html->script('jquery.js');
    echo $this->Html->script('bootstrap.js');
    ?>
</body>
</html>
