<?php ?> 

<h1><?= $post->user->pseudo ?></h1>

    <div>
            <p>Id : <?= $post->created ?></p>
            <p>Créé : <?= $post->created ?></p>
            <figure>
                <?= $this->Html->image('post/'. $post->picture, ['alt' => $post->description_img])?>
            </figure>
            <p>Post description : <?= $post->description?></p>
    </div>
        
