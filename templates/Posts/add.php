<?php ?>

<h1>Ajouter un post</h1>

    <?= $this->Form->create($add, ['type' => 'file']) ?>

    <fieldset>
         <?= $this->Form->control('picture', ['type' => 'file', 'required'=>true]) ?>
         <?= $this->Form->control('description', ['required'=>true]); ?>
        <?= $this->Form->button('Ajouter') ?>

        <?= $this->Form->end() ?>

    </fieldset>

    

    