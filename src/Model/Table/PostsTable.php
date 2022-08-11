<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Phinx\Db\Table\ForeignKey;

class PostsTable extends Table{
    public function initialize(array $c): void{
        parent::initialize($c);
 
        //pour created & modified
        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);

        //on ajoute la liaison avec les commentaires
        $this->hasMany('Comments', ['ForeignKey' => 'post_id']);
        $this->hasMany('Likes', ['ForeignKey' => 'post_id']);
    }

    //on définit les élèments de validation qui seront appelés automatiquement
    public function validationDefault(Validator $v) : Validator{

        $v
            ->notEmptyString('pseudo')
            ->notEmptyString('picture')
            ->allowEmptyString('description');

        return $v;
    
    }
}