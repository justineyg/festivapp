<?php ?>

    <h1>Profil <?= $profil->pseudo ?></h1>

    
    <div>
    <p> <figure>
            <?= $this->Html->image('/img/user/user.jpg', ['alt' => 'User image', 'style' => 'height: 100px; width: 100px; display: block;']);?>
       </figure>
    </p>
        <p>Pseudo : <?= $profil->pseudo ?></p>
        <p>Email : <?= $profil->email ?></p>
    
     

        <p><?= $this->Html->link('Modifier', ['action' => 'edit', $profil->id], ['class' => 'button'])?></p>
     
        
    </div>
    
				

   