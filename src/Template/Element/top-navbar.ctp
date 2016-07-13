<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <?= $this->Html->link(__('Warehouse Management System'), ['controller' => 'Pages', 'action' => 'display', 'home'], ['class' => 'navbar-brand']) ?>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
             </button>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <?php if ($user_username): ?>
                        <p class="navbar-text">
                            <span class="glyphicon glyphicon-user"></span>
                            <?= h("$user_fullname ($user_username)") ?>
                        </p>
                        <li><?= $this->Html->link(__('Sign Out'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
                    <?php endif; ?>
                    <li><?= $this->Html->link(__('Help'), 'http://ice-sib.github.io/sib') ?></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
