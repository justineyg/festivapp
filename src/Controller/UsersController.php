<?php

namespace App\Controller;

use Authentication\Authenticator\Result;
use Cake\Event\EventInterface;

class UsersController extends AppController{

    public function beforeFilter(\Cake\Event\EventInterface $e)
    {
        parent::beforeFilter($e);

        //autorise certaines actions sans-être connecté (seulement pour ce controller)
        $this->Authentication->addUnauthenticatedActions(['new', 'login']);
    }

    public function new(){
        $u = $this->Users->newEmptyEntity();
        if($this->request->is('post')){
            $u = $this->Users->patchEntity($u, $this->request->getData());

            if($this->Users->save($u)){
                $this->Flash->success('Bienvenue!');
                return $this->redirect(['controller' => 'Festivals', 'action' => 'index']);
            }else{
                $this->Flash->error('Impossible de créer le compte');
            }
        }
            $this->set(compact('u'));
    }

    public function login(){
        $result = $this->Authentication->getResult();

        //Si le user est connecté, on le dirige vers l'accueil
        if($result->isValid()){
            $this->Flash->success('Welcome back !');
            return $this->redirect(['controller' => 'Festivals', 'action' => 'index']);
        }
        //Si on a reçu le form et que les infos ne sont pas bonnes 
        if($this->request->is('post')&& !$result->isValid()){
            $this->Flash->error('Identifiants incorrects');
        }
    }

    public function logout(){
        $result = $this->Authentication->getResult();
        if($result->isValid()){
            $this->Authentication->logout();
            $this->Flash->success('À bientôt');
        }
        return $this->redirect(['controller' => 'Festivals', 'action' => 'index']);

    }
    
}