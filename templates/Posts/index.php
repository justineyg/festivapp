<?php ?>

    <h1>FestivApp' - Fil d'actualité</h1>

        <div>
            <?php foreach($allPosts as $p) : ?>
            <div class="card">
                <div class="card-header">
                <?php //si on n'est pas connecté
                        if($this->request->getAttribute('identity') == null) : ?>
                         <?php else : ?>
                    <p class="user"><?= $this->Html->link($p->user->pseudo, ['controller' => 'Users', 'action' => 'profil', $p->user->id])?></p>
                     <?php endif; ?>
                    <p class="edit"><?= $this->Html->link('Modifier', ['action' => 'edit', $p->id]) ?></p>
                </div>
                <figure class="picture">
                    <!--Balise img-->
                    <?= $this->Html->image('/img/post/'.$p->picture, array("alt" => $p->description_img))?>
                </figure>
                <div class="card-footer">
                <p class="description">
                    <span class="user"><?= $p->user->pseudo ?></span> <?= $p->description ?>
                </p>
                <p><?= $p->comment ?></p>
                
                <hr>
                <p class="add"><?= $this->Html->link('Ajouter un commentaire', ['action' => 'view', $this->request->getAttribute('identity')->id]) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
            </div>
            
   

    </li>
</div>
    