<?= $this->Form->create() ?>
    <h1 class="text-center"><?= __('Sign In') ?></h1>
    <?= $this->Form->input('username') ?>
    <?= $this->Form->input('password') ?>
<?= $this->Form->button(__('Sign In'), ['class' => 'btn-primary btn-block']); ?>
<?= $this->Form->end() ?>
