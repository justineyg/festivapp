<?php ?>

<h1>FestivApp' - Fil d'actualité</h1>

    <div class="card">
        <?php foreach($allPosts as $p) : ?>
                <p><?= $this->Html->link($p->user->pseudo, ['controller' => 'Posts', 'action' => 'user', $p->user->id])?></p>
                
                <figure class="picture">
                    <!--Balise img-->
                    <img src='/webroot/img/post/<?=($p->picture)?>' alt='<?=($p->description_img)?>'>
                </figure>
                <p><?= $p->description ?></p>
                <p><?= $p->comment ?></p>
            
            <?php endforeach; ?>

            <?= $this->Html->link('Ajouter un commentaire', ['action' => 'view']) ?>
    </div>
