<?php ?>

    <h1>FestivApp' - Fil d'actualité</h1>

        <div>
            <?php foreach($allPosts as $p) : ?>
            <div class="card">
            
                
                <p><?= $this->Html->link($p->user->pseudo, ['controller' => 'Posts', 'action' => 'user', $p->user->id])?></p>
                
                <figure class="picture">
                    <!--Balise img-->
                    <?= $this->Html->image('/img/post/'.$p->picture, array("alt" => $p->description_img))?>
                </figure>
                <p><?= $p->description ?></p>
                <p><?= $p->comment ?></p>

            <p><?= $this->Html->link('Modifier', ['action' => 'edit']) ?></p>
            <p><?= $this->Html->link('Ajouter un commentaire', ['action' => 'view']) ?></p>
            </div>
            <?php endforeach; ?>
            </div>
            
   

    </li>
</div>
    