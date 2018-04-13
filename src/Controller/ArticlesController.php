<?php
// src/Controller/ArticlesController.php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Classe Artigos
 */
class ArticlesController extends AppController
{
  //Construtor herdanndo funções do papis
  //inserindo também os componentes de Paginação e Mensagens
  public function initialize()
  {
    parent::initialize();
    $this->loadComponent('Paginator');
    $this->loadComponent('Flash');
  }

  /**
   * Listagem de Artigos
   */
  public function index()
  {
    $artigos = $this->Paginator->paginate($this->Articles->find());
    $this->set(compact('artigos'));
  }

  /**
   * Listagem de um Artigo
   */
   public function view($slug = null)
   {
     $artigo  = $this->Articles->findBySlug($slug)->firstOrFail();
     $this->set(compact('artigo'));
   }

   public function add()
   {
     //debug($this->request->getData());
     $artigo = $this->Articles->newEntity();
     if($this->request->is('post'))
     {
        $artigo = $this->Articles->patchEntity($artigo, $this->request->getData());
        // Hardcoding the user_id is temporary, and will be removed later
        // when we build authentication out.
        $artigo->user_id = 1;
        if($this->Articles->save($artigo))
        {
            $this->Flash->success(__("Artigo Salvo com Sucesso."));
            return $this->redirect( ['action' => 'index'] );
        }
        $this->Flash->error(__("Erro ao Salvar Artigo."));
     }
     $this->set('artigo',$artigo);
   }

   public function edit($slug)
   {
     $artigo = $this->Articles->findBySlug($slug)->firstOrFail();
     if($this->request->is(['post','put']))
     {
        $this->Articles->patchEntity($artigo, $this->request->getData());
        if($this->Articles->save($artigo))
        {
            $this->Flash->success(__('Seu Artigo  foi atualizado com Sucesso.'));
            return $this->redirect( ['action' => 'index'] );
        }
        $this->Flash->error(__('Edição não Realizada.'));
     }
     $this->set('artigo', $artigo);
   }

   public function delete($slug)
   {
     $this->request->allowMethod( ['post','delete'] );

     $artigo = $this->Articles->findBySlug($slug)->firstOrFail();
     if($this->Articles->delete($artigo))
     {
        $this->Flash->success(__("Artigo {0} Removido com Sucesso.", $artigo->title));
        return $this->redirect( [ 'action' => 'index' ] );
     }
   }
}

?>
