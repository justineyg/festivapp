<?php 

namespace App\Controller;

use Cake\Error\Debugger;
use Cake\Event\EventInterface;

class PostsController extends AppController{

    public function index(){
        //récupèree tous les enregistrements du model Post
        $allPosts = $this->Posts->find()
        ->contain(['Comments', 'Likes', 'Users']);

        //TRANSMET À LA VARIABLE posts à la view
        $this->set(compact('allPosts'));
    }

    public function add(){
       //entité vide
        $add = $this->Posts->newEmptyEntity();
        //Si on arrive sur cette action  en méthod post
        if($this->request->is('post')){
            //on récupère les données de la requête pour les placer dans l'entité
            $add = $this->Posts->patchEntity($add, $this->request->getData());
            if(!$add->getErrors){
            $image = $this->request->getData('picture');
            $name = $image->getClientFilename();

            
            $type = $image->getClientMediaType();
            $targetPath = WWW_ROOT. 'img'. DS . 'post'. DS. $name;
            if ($type == 'image/jpeg' || $type == 'image/jpg' || $type == 'image/png') {
                if (!empty($name)) {
                    if ($image->getSize() > 0 && $image->getError() == 0) {
                        $image->moveTo($targetPath); 
                        $attachment['post'] = $name;
                    }
                }
            }
            if($name)
            $image->moveTo($targetPath);

            $add->picture = $name;
        }
            //Si la sauvegarde fonctionne
            if($this->Posts->save($add)){
                //On créé un mess de confirmation
                $this->Flash->success('Enregistrement ok');
                //On redirige vers l'accueil
                return $this->redirect(['controller' => 'Posts', 'action' => 'index']);
            }

            //sinon (si ça a planté)
            //On crée un mess d'erreur
            $this->Flash->error('Impossible de sauvegarder, vérifier vos données');
        }

        //On transmet l'entité à la vue
        $this->set(compact('add'));
   }

    public function edit(){
        //si l'id est vide
        if(empty($id))
            return $this->redirect(['action' => 'index']);
            $post = $this->Posts->find()->where(['id' => $id]);
            if($post->isEmpty()): 
                $this->Flash->error('Chanson introuvable');
                //retour accueil
                return $this->redirect(['action' => 'index']);
            
            endif;
            $spost = $post->first();

            //Si on a reçu le form (similaire à l'ajout, changement pour la redirection et les méthodes valides)
             //Si la sauvegarde fonctionne
        if ($this->request->is(['patch', 'post', 'put'])){
            $post = $this->Posts->patchEntity($post, $this->request->getData());

            //si la sauvegarde fonctionne
            if($this->Posts->save($post)){
                //message succes
                $this->Flash->success('La chanson a été modifiée');
                //redirige vers la fiche de chanson
                return $this->redirect(['action' => "index", $id]);
            }
            $this->Flash->error('Modification impossible');
        }
        $this->set(compact('post'));
    }

    public function user(){
       
    }

    public function view($id = null){
        //on charge la définition du model
        $this->loadModel('Comments');
        //on créé une entité  vide
        $newcomment = $this->Comments->newEmptyEntity();

        $this->set(compact('newcomment'));

      
        

        }
    
}