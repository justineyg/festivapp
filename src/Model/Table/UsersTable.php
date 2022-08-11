<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;


class UsersTable extends Table{

    public function initialize(array $c): void{
        parent::initialize($c);

        //on lui demande de gérer correctement seul les colonnes created_at et modified_at
        $this->addBehavior('Timestamp');
        
    }
  
   
}