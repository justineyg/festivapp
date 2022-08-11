<?php ?>

    <h1>Profil <?= $this->request->getAttribute('identity')->pseudo ?></h1>

    <div>
       <figure>
            <?= $this->Html->image('/img/user/user.jpg', ['alt' => 'User image', 'style' => 'height: 100px; width: 100px; display: block;']);?>
       </figure>

    <p>Pseudo <?= $profil->pseudo ?></p>
    <p>Email <?= $profil->email ?></p>

    <p>
            <?= $this->Html->link('Modifier', ['action' => 'edit', $user->id], ['class' => 'button'])?>
        </p> 

        
    </div>
    
				

   