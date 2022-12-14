<?php 

namespace App\Controller;
use Cake\Event\EventInterface;
use phpDocumentor\Reflection\Types\Null_;

class UsersController extends AppController{

    public function beforeFilter(\Cake\Event\EventInterface $e){
        parent::beforeFilter($e);

        //autorise l'accès à l'action login sans être connecté
        $this->Authentication->addUnauthenticatedActions(['login', 'new']);
    }


    public function login(){
        if($this->request->is(['post'])){
            //on recup le match des identifiants
            $result = $this->Authentication->getResult();

            //si c'est valid
            if($result->isValid()){
                //welcome
                $this->Flash->success('Bienvenue');
                //redirection
                $redirect = $this->request->getQuery('redirect', ['controller' => 'Posts', 'action' => 'index']);

                return $this->redirect($redirect);
            }else//sinon
            //error
            $this->Flash->error('Problème d\'identifiant');
        }
    }

    public function new(){
        //entité vide
        $new = $this->Users->newEmptyEntity();
        
        //si on récup un form
        if($this->request->is('post')){
            //on met les données dans l'entité
            $new = $this->Users->patchEntity($new, $this->request->getData());

        //Si on peut sauvegarder
        if($this->Users->save($new)){
            //success
            $this->Flash->success('Bienvenue');
            //redirection
            return $this->redirect(['controller' => 'Posts', 'action' => 'index']);
            }
            //error
            $this->Flash->error('Réesayer');
        }
        //transmet à la vue
        //autre méthode $this->set()
        $this->set(compact('new'));
    }

    public function logout(){
        //recup les éléments d'authentication / la cession en cours
        $log = $this->Authentication->getResult();

        //si cette cession était valide
        if($log->isValid()){
            //on déco
            $this->Authentication->logout();
            //success
            $this->Flash->success('À bientôt');
        }
        //On redirige
        return $this->redirect(['controller' => 'Festivals', 'action' => 'index']);
        
    }
    

    public function profil($id = null){
        if(empty($id))
       return $this->redirect(['controller' => 'festivals', 'action' => 'index']);

       //On utilise le find dynamique FindByNomdecolonne
       $p = $this->Users->find()
       ->where(['Users.id' => $id]);

       if($p->isEmpty()) :
        $this->Flash->error('Utilisateur introuvable');
        return $this->redirect([
            'controller' => 'Posts',
            'action' => 'index'
        ]);
    endif;
       $this->set(['profil' => $p->first()]);
       
    }

    public function edit($id = null){
            //si on ne connaît pas l'id du post
            if(empty($id)){
                //erreur
                $this->Flash->error('Modification impossible');
                //on retourne sur la page principale
                return $this->redirect(['controller' => 'Posts', 'action' => 'index']);
            }
            //on récupère le post avec son id
            $element = $this->Users->findById($id);
            //si on a 0 résultat
            if($element->isEmpty()){
                //erreur
                $this->Flash->error('Modification impossible');
                //On retourne sur la page d'accueil
                return $this->redirect(['controller' => 'Posts', 'action' => 'edit', $id]);
            }
    
            //On récupère l'objet épisode
            $e= $element->first();
                    
            //si on est en mode reception du form
            if($this->request->is(['patch', 'patch', 'put'])){
                $e = $this->Users->patchEntity($e, $this->request->getData());
                 //si la sauvegarde fonctionne
        if($this->Users->save($e)){

            //message succes
                $this->Flash->success('Le profil a été modifié');
                //On redigige vers la page detail de la série à laquellel'épisode appartient
                return $this->redirect([ 'action' => "profil", $e->post_id]);
            }

            //message erreur
            $this->Flash->error('modification impossible');
        }//fin test method

            $this->set(compact('e'));
    }
    }
