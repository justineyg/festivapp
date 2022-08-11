<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class LikesTable extends Table{
    public function initialize(array $c): void{
        parent::initialize($c);
 
        //pour created & modified
        $this->addBehavior('Timestamp');

        //on ajoute la liaison avec les commentaires
        //on ajoute la liaison avec les commentaires
        $this->belongsTo('Posts', [
            'foreignKey' => 'post_id',
            'joinType' => 'INNER'
        ]);
    }
}