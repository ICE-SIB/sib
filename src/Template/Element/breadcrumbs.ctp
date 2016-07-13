<?=
$this->Html->getCrumbList(['lastClass' => 'active', 'class' => 'breadcrumb'],
    [__('Home'), ['controller' => 'Pages', 'action' => 'display', 'home']])
?>
