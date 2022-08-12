<?php ?>

<h1>Modifier un post</h1>
<?= $this->Form->create($e, ['type' => 'file']) ?>


    <!--Balise img-->
    <?= $this->Form->control('img', [
         'type' => 'file', 
         'required'=>true
         ]) ?>


    <?= $this->Form->control('description_img')?>
    <?= $this->Form->control('description')?>

    <?= $this->Form->button('Modifier') ?>

<?= $this->Form->end() ?>