<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $this->fetch('title') ?></title>

        <?= $this->Html->meta('icon') ?>
        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('paginator.css') ?>
        <?= $this->Html->css('required.css') ?>
    </head>
    <body>
        <?= $this->element('top-navbar') ?>
        <div class="container">
            <?php
            echo $this->Flash->render();
            if ($user_username)
            	echo $this->element('breadcrumbs');
            echo $this->fetch('content');
            ?>          
        </div>
        <footer>
            <?= $this->element('bottom-navbar') ?>
        </footer>
        <?= $this->Html->script(['jquery-1.9.1.min.js', 'bootstrap.min.js']) ?>
    </body>
</html>
