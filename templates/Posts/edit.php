<?php ?>

<h1>Modifier un post</h1>
<?= $this->Form->create($e) ?>


    <figure class="picture">
                    <!--Balise img-->
                    <?= $this->Html->image('/img/post/'.$p->picture, array("alt" => $p->description_img))?>
                </figure>
    <?= $this->Form->control('picture')?>

    <?= $this->Form->button('Modifier') ?>

<?= $this->Form->end() ?>