
<h1>Modification profil </h1>

<?= $this->Form->create($e); ?>


    <?= $this->Form->control('pseudo') ?>
    <?= $this->Form->control('email') ?>

    <?= $this->Form->button('Modifier') ?>


<?= $this->Form->end() ?>
