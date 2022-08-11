<?php ?>

<h1>Modifier un post</h1>
<?= $this->Form->create($post) ?>


    <?= $this->Form->control('description') ?>
    <?= $this->Form->control('picture')?>

    <?= $this->Form->button('Modifier') ?>

<?= $this->Form->end() ?>