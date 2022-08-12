<?php 

namespace App\Controller;

use Cake\Error\Debugger;
use Cake\Event\EventInterface;

class PostsController extends AppController{

    public function index(){
        //récupèree tous les enregistrements du model Post
        $allPosts = $this->Posts->find()
        ->contain(['Comments', 'Users']);

        //TRANSMET À LA VARIABLE posts à la view
        $this->set(compact('allPosts'));
    }

    public function add(){
       //entité vide
        $add = $this->Posts->newEmptyEntity();

        //Si on arrive sur cette action  en méthod post
        if($this->request->is('post', 'put')){
            //on récupère les données de la requête pour les placer dans l'entité
            $add = $this->Posts->patchEntity($add, $this->request->getData());

            $username = $this->request->getAttribute('identity')->pseudo;
            $count = 0;

            $image = $this->request->getData('img');

            $ext = pathinfo($image->getClientFilename(), PATHINFO_EXTENSION);
            $name = $username.'-'.time().$count.'.'.$ext;
            $image->moveTo(WWW_ROOT.'img/post/'.$name);

            $add->picture = $name;

            $add->user_id = $this->request->getAttribute('identity')->id;

            //Si la sauvegarde fonctionne
            if($this->Posts->save($add)){
                //On créé un mess de confirmation
                $this->Flash->success('Enregistrement ok');
                //On redirige vers l'accueil
                return $this->redirect(['action' => 'index']);
            }

            //sinon (si ça a planté)
                //On crée un mess d'erreur
                $this->Flash->error('Impossible d\'ajouter le post');
        }

        //On transmet l'entité à la vue
        $this->set(compact('add'));
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
        $element = $this->Posts->findById($id);
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
            $e = $this->Posts->patchEntity($e, $this->request->getData());


            $username = $this->request->getAttribute('identity')->pseudo;
            $count = 0;

            $image = $this->request->getData('img');

            $ext = pathinfo($image->getClientFilename(), PATHINFO_EXTENSION);
            $name = $username.'-'.time().$count.'.'.$ext;
            $image->moveTo(WWW_ROOT.'img/post/'.$name);

            $e->picture = $name;

            $e->user_id = $this->request->getAttribute('identity')->id;
        //si la sauvegarde fonctionne
        if($this->Posts->save($e)){

            //message succes
                $this->Flash->success('l\'épisode a été modifiée');
                //On redigige vers la page detail de la série à laquellel'épisode appartient
                return $this->redirect(['controller' => 'Posts', 'action' => "index", $e->post_id]);
            }

            //message erreur
            $this->Flash->error('modification impossible');
        }//fin test method

            $this->set(compact('e'));
    }

    public function user($id = null){
        if(empty($id))
        return $this->redirect(['action' => 'index']);

        //On utilise le finder dynamique findByNomDeColonne
        $p = $this->Users->find($id)
        ->where(['User.id' => $id]); //faut préciser sinon il ne sait pas distinguer 
       

        //si la reque n'a pas trouvé aucun résultart
        if($p->isEmpty()){
            $this->flash->error('Sa fiche est introuvable');
            return $this->redirect(['action' => 'index']);
        }
        //On transmet la 1ère ligne de la requête à lavue
        $this->set(['user' => $p->first()]);
        //var_dump($b->first());

    }

    public function view($id = null){
        //on charge la définition du model
        $this->loadModel('Comments');
        //on créé une entité  vide
        $newcomment = $this->Comments->newEmptyEntity();

        $this->set(compact('newcomment'));
        

        }
    
}