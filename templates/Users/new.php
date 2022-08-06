<?php ?>

<h1>Créer un compte</h1>

<?= $this->Form->create($u) ?>

    <?= $this->Form->control('pseudo') ?>

    <?= $this->Form->control('password', ['label' => 'Mot de passe']) ?>

    <?= $this->Form->button('Valider') ?>

<?= $this->Form->end() ?>