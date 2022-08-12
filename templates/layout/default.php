<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@400;700&family=Poppins:wght@700&display=swap" rel="stylesheet">
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'all.min', 'style']) ?>
    
    


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>">
            <figure class="picture">
                    <!--Balise img-->
                    <?= $this->Html->image('/img/festivapp_logo.png', ['alt' => "logo", 'class' => 'logo'])?>
                    <?= $this->Html->image('/img/festivapp_logo_mobile.png', ['alt' => "logo", 'class' => 'logomobile'])?>
                </figure>
            
        </div>
        <div class="top-nav-links">

        
        <?php //si on n'est pas connecté
           if($this->request->getAttribute('identity') == null) : ?>
        <?= $this->Html->link('Signup',
         ['controller' => 'Users', 'action' => 'new'], ['class' => 'superclasse', 'escape' => false]) ?>
        <?= $this->Html->link('Se connecter</i>', 
        ['controller' => 'Users', 'action' => 'login'], ['class' => 'superclasse', 'escape' => false]) ?>

        <?php else : ?>
           
            <?= $this->Html->link('
        <i class="fa-solid fa-house" aria-hidden="true"></i>',
         ['controller' => 'Posts', 'action' => 'index'], ['class' => 'superclasse', 'escape' => false]) ?>

            <?= $this->Html->link(
                '<i class="fa-solid fa-plus" aria-hidden="true"></i>', 
                ['controller' => 'Posts', 'action' => 'add'], ['class' => 'superclasse', 'escape' => false]) ?>
             <?= $this->Html->link(
                '<i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i>', 
                ['controller' => 'Users', 'action' => 'logout'], ['class' => 'superclasse', 'escape' => false]) ?>
            <?= $this->Html->link(
                '<i class="fa-solid fa-user" aria-hidden="true"></i>', 
                ['controller' => 'Users', 'action' => 'profil', $this->request->getAttribute('identity')->id], ['class' => 'superclasse', 'escape' => false]) ?>
                
            <span> <?= $this->request->getAttribute('identity')->pseudo ?></span>
            <?php endif; ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
