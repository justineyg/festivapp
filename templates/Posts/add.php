<?php ?>

<h1>Ajouter un post</h1>

<?= $this->Form->create($add,['enctype'=>'multipart/form-data'])?>

    <fieldset>
         <?= $this->Form->control('img', [
         'type' => 'file', 
         'required'=>true
         ]) ?>
         <?= $this->Form->control('description_img', [
            'required'=>true,
            'placeholder' => 'Ex : Festival by night'
        ]); ?>
         <?= $this->Form->control('description', [
            'required'=>true,
            'placeholder' => "Ex : Fresh air"
        ]); ?>

        <?= $this->Form->button('Ajouter') ?>
<?= $this->Form->end() ?>

    </fieldset>

    

    
