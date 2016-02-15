<ul class= "list-unstyled header">
  <?php foreach ($articles as $article): ?>
    <li style="font-size:12px;">
      <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' => 'view', $article['Article']['id']));?> &nbsp;
        <?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],150));?>
      </li>
  <?php endforeach;?>
</ul>
