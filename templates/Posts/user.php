<?php ?> 

<h1><?= $user->user->pseudo ?></h1>

    <div>
            <p>Id : <?= $user->created ?></p>
            <p>Créé : <?= $user->created ?></p>
            <figure>
                <?= $this->Html->image('post/'. $user->picture, ['alt' => $user->description_img])?>
            </figure>
            <p>Post description : <?= $user->description?></p>
    </div>
        
