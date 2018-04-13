<!-- File: src/Template/Articles/view.ctp -->
<h1><?php echo h($artigo->title);?></h1>
<p><?php echo h($artigo->body);?></p>
<p><small>Criado em: <?php echo $artigo->created->format(DATE_RFC850);?></small></p>
<p><?php echo $this->Html->link('Editar', ['action' => 'edit', $artigo->slug] ) ?></p>
