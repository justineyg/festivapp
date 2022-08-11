<?php 

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\Validation\Validator;

class CommentsController extends AppController{
  

    //On définit les élèments de validation qui seront appelés automatiquement
    public function validationDefault(Validator $v): Validator{
        
        $v  

            ->notEmptyString('comment')
            ->maxLength('comment', 500);
        
            return $v;
    }
}