<?php ?>

    <h1>Profil <?= $this->request->getAttribute('identity')->pseudo ?></h1>

    <h1><?= $profil->pseudo?></h1>

    
    <p>Pseudo <?= $profil->pseudo ?></p>
    <p>Email <?= $profil->email ?></p>
				

    <p>
        <?= $this->Html->link('Modifier', ['action' => 'edit', $user->id], ['class' => 'button'])?>
    </p> 