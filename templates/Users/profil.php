<?php ?>

    <h1>Profil <?= $profil->pseudo ?></h1>

    <?php //si on n'est pas connecté
           if($this->request->getAttribute('identity') == null) : ?>
    <div>
    <p><?= $this->Html->link('Modifier', ['action' => 'edit', $profil->id], ['class' => 'button'])?></p>
    
    <?php else : ?>
        <p> <figure>
            <?= $this->Html->image('/img/user/user.jpg', ['alt' => 'User image', 'style' => 'height: 100px; width: 100px; display: block;']);?>
       </figure>
    </p>
        <p>Pseudo : <?= $profil->pseudo ?></p>
        <p>Email : <?= $profil->email ?></p>
        <?php endif; ?>
        
    </div>
    
				

   