<!-- File: src/Template/Articles/index.ctp -->
<h1>Articles</h1>
<p><?php echo $this->Html->link("Novo Artigo", ['action' => 'add'], [ 'class' => 'button'] );?></p>
<table>
    <tr>
        <th>Título</th>
        <th>Criado</th>
        <th>Ação</th>
    </tr>
    <!-- Here is where we iterate through our $articles query object, printing out article info -->
    <?php foreach ($artigos as $artigo): ?>
    <tr>
        <td>
            <?= $this->Html->link($artigo->title, ['action' => 'view', $artigo->slug]) ?>
        </td>
        <td>
            <?= $artigo->created->format(DATE_RFC850) ?>
        </td>
        <td>
          <?php echo $this->Html->link('Editar', ['action' => 'edit', $artigo->slug]);?>
          <?php echo $this->Form->postLink(
            'Remover', ['action' => 'delete', $artigo->slug],
            ['confirm' => 'Deseja Remover o Artigo?']
          );
          ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
