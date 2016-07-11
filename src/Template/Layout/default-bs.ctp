<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->meta('icon') ?>
        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('paginator.css') ?>
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <!-- Top Navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <?= $this->Html->link(__('Warehouse Management System'), ['controller' => 'Users', 'action' => 'main-menu'], ['class' => 'navbar-brand']) ?>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                     </button>
                </div>
                <div class="collapse navbar-collapse" id="main-navbar">
                	<div class="navbar-right">
                		<p class="navbar-text">
                			<span class="glyphicon glyphicon-user"></span>
                			<?= 'Add user name here' ?>
                		</p>
                		<ul class="nav navbar-nav">
                			<li>
                				<?= $this->Html->link(__('Sign Out'), ['controller' => 'Users', 'action' => 'logout']) ?>
                			</li>
                			<li>
                				<?= $this->Html->link(__('Help'), 'http://ice-sib.github.io/sib') ?>
                			</li>
                		</ul>
                	</div
                </div>
            </div>
        </nav>
        <!-- /Top Navbar -->
        <div class="container">
            <!-- Content -->
            <?= $this->Flash->render() ?> 
            <?= $this->fetch('content') ?>
            <!-- /Content -->
        </div>
        <footer>
        	<nav class="navbar navbar-default navbar-fixed-bottom">
  				<div class="container">
  					<p class="navbar-text"><?= __('Copyright &copy; {0} ICE-SIB', date('Y')) ?></p>
 				</div>
			</nav>
        </footer>
        <?= $this->Html->script(['jquery-1.9.1.min.js', 'bootstrap.min.js']) ?>
    </body>
</html>
