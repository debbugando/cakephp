<!-- File: src/Template/Articles/add.ctp -->
<h1>Adicionar Artigo</h1>
<?php
  echo $this->Form->create($artigo);
  //Hard code para id de usuário
  echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1] );
  echo $this->Form->control('title');
  echo $this->Form->control('body', ['rows' => 3] );
  echo $this->Form->button(__('Salvar Artigo'));
  echo $this->Form->end();
?>
