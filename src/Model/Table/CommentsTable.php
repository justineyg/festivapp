<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CommentsTable extends Table{
    public function initialize(array $c): void{
        parent::initialize($c);
 
        //pour created & modified
        $this->addBehavior('Timestamp');

        //on ajoute la liaison avec les commentaires
        $this->belongsTo('Posts', [
            'foreignKey' => 'post_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $v): Validator{
        $v 
            ->notEmptyString('picture')
            ->notEmptyString('user_id')
            ->allowEmptyString('description')
            ->allowEmptyString('festival_id');

            return $v;

    }
}