<div class="archive-module sidebar">
  <h4 id="hide"><?php  echo __('Archives') ?></h4>
    <ul class="list-unstyled" id="hidden">
      <li><?php echo $this->Html->link(__('March 2016'),array('controller' => 'articles',
               'action' =>'index','?' => array('month'=>3))); ?></li>
      <li><?php echo $this->Html->link(__('February 2016'),array(
               'controller' => 'articles', 'action' =>'index', '?' => array('month' => 2)));?></li>
      <li><?php echo $this->Html->link(__('January 2016'),array(
               'controller' => 'articles', 'action' =>'index','?' => array('month' => 1))); ?></li>  
      <li><?php echo $this->Html->link(__('December 2016'),array('controller' => 'articles', 
               'action' =>'index','?' =>array('month' => 12))); ?></li>
      </ul>
  </div>
<div class="article-module sidebar">
  <h4 id="hide1">Category</h4>
    <ul class="list-unstyled" id="hidden1">
      <li><?php echo $this->Html->link(__('Technology'),array('controller' => 'articles','action' =>'index','?' => array('cat_id'=>1)));?> </li>
      <li><?php echo $this->Html->link(__('Science and Health'),array('controller' => 'articles','action' =>'index','?' => array('cat_id'=>2))); ?> </li>
      <li><?php echo $this->Html->link(__('Random Articles'),array('controller' => 'articles','action'=>'index','?' => array('cat_id'=>3)));?></li>
    </ul>
</div>
<div class="article-module sidebar">
  <h4 id="hide1">Popular Articles</h4>
  <?php if($articles): ?>
    <?php foreach ($articles as $article): ?>
      <ul class= "list-unstyled" id= "hidden1">
        <li style="font-size: 16px;"><?php echo $this->Html->link($article['Article']['title'],array( 'controller' => 'articles','action' => 'view', $article['Article']['id']));?></li>
        <li><?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],100));
            ?></li>
      </ul>
    <?php endforeach;?>
  <?php endif;?>
</div>
<div class="category-module sidebar">
  <h4 id="hide1"><?php echo __('Article Comments') ?></h4>
    <ul class="list-unstyled" id="hidden1">
       <?php echo $this->element('index_comment'); ?> 
    </ul>
</div>


