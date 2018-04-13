<!-- File: src/Template/Articles/edit.ctp -->
<h1>Edição de Artigo</h1>
<?php
  echo $this->Form->create($artigo);
  echo $this->Form->control('user_id', ['type' => 'hidden'] );
  echo $this->Form->control('title');
   echo $this->Form->control('body', ['rows' => '3']);
  echo $this->Form->button('Editar Artigo');
  echo $this->Form->end();
?>
