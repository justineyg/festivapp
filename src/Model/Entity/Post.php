<?php 

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Post extends Entity{

    //On précise quelles sont les colonnes qui peuvent être modifiées
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

}