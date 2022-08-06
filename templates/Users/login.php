<?php ?>

<h1>Se connecter</h1>
<?= $this->Form->create() ?>
    <?= $this->Form->control('pseudo') ?>
    <?= $this->Form->control('password', ['label' => 'Mot de passe']) ?>
    <?= $this->Form->button('Se connecter') ?>

<?= $this->Form->end() ?>