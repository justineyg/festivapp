<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class User extends Entity{
     //On précise quelles sont les colonnes qui peuvent être modifiées
     protected $_accessible = [
        '*' => true,
        'id' => false
    ];
/*Cette fonction sera utilisée automatiquement dès que l'on utilisera le champs password 

Le nom de la fonction est dynamique et dépend de la bdd : 
si le champ de la base se nomme : plop
la fonction a le nom : _setPlop */
    protected function _setPassword(string $s) : ?string{
        //Si le password fourni fait plus de 0 caractères
        if(strlen($s) > 0)
            //On retourne sa version cryptée
            return (new DefaultPasswordHasher())->hash($s);
    }
}

