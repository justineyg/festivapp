<?php ?>

<h1>Créer un compte</h1>

<?= $this->Form->create($new) ?>

    <?= $this->Form->control('pseudo', ['label' => 'Pseudo']) ?>
    <?= $this->Form->control('email', ['label' => 'Email']) ?>
    <?= $this->Form->control('password', ['label' => 'Mot de passe']) ?>

    <?= $this->Form->button('Valider') ?>

<?= $this->Form->end() ?>