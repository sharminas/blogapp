
    
      <div class="sidebar">
        <h4 class="style"><?php  echo __('Archives') ?> </h4>
          <div class="sideli">
            <ul class="list-unstyled header">
                <li><?php echo $this->Html->link(__('March 2016'),array('controller' => 'articles',
                    'action' =>'index_filter','?' => array('month'=>3))); ?></li>
                <li><?php echo $this->Html->link(__('February 2016'),array('controller' => 'articles', 
                    'action' =>'index_filter', '?' => array('month' => 2)));?> </li>
                <li><?php echo $this->Html->link(__('January 2016'),array('controller' => 'articles', 
                    'action' =>'index_filter','?' => array('month' => 1))); ?></li>
                <li><?php echo $this->Html->link(__('December 2015'),array('controller' => 'articles',
                    'action' =>'index_filter','?' =>array('month' => 12))); ?></li>
            </ul>
          </div>
      </div>
      <div class="sidebar">
        <h4 class="style"><?php echo __('Category') ?></h4>
          <div class="sideli">
            <ul class="list-unstyled header">
                <li><?php echo $this->Html->link(__('Technology'),array('controller' => 'articles','action' =>'index_filter','?' => array('cat_id'=>1)));?></li>
                <li><?php echo $this->Html->link(__('Science and Health'),array('controller' => 'articles','action' =>'index_filter','?' => array('cat_id'=>2))); ?> </li>
                <li><?php echo $this->Html->link(__('Programming'),array('controller' => 'articles','action' =>'index_filter','?' => array('cat_id'=>4))); ?></li>
                <li><?php echo $this->Html->link(__('Random Articles'),array('controller' => 'articles','action'=>'index_filter','?' => array('cat_id'=>3)));?></li>
            </ul>
          </div>
      </div>
      <div class="sidebar">
        <h4 class="style"><?php echo __('Popular Articles') ?></h4>
          <div class="sideli">
            <ul class= "list-unstyled header">
            <?php if($articles): ?>
              <?php foreach ($articles as $article): ?>
                <?php if($article['Article']['like_num'] > 1) :?>

                  <li style="font-size:12px; color: gray;">
                      <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' => 'view', $article['Article']['id']));?> &nbsp;
                      <?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],150));?>
                  </li>
                <?php endif;?>
              <?php endforeach;?>
            <?php endif; ?>
            </ul>
          </div>
      </div>
      <div class="comments-module sidebar">
          <h4 class="style" id="hide1"><?php echo __('Article Comments') ?></h4>
            <div class="sideli">
              <ul class="list-unstyled" id="hidden1">
                  <li><?php echo $this->element('index_comment'); ?></li>
              </ul>
            </div>
      </div>
      <div class="sidebar">
        <h4 class="style"><?php echo __('Topics') ?></h4>
          <div class="sideli">
            <?php if($articles): ?>
              <?php foreach ($articles as $article): ?>
                <p class="btn btn-default"><?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' => 'view', $article['Article']['id']));?></p>
              <?php endforeach;?>
            <?php endif; ?>

          </div>
      </div>
      <div class="sidebar">
        <h4 class="style"><?php echo __('Recent Articles') ?></h4>
          <div class="sideli">
            <?php if($articles) :?>
              <?php foreach($articles as $article):?>
                <?php if($article['Article']['id'] == 3):?>               
                  <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' =>'view',$article['Article']['id']));?>
                  <small style="color:black;"><?php echo $this->Time->format('F j, Y h:i A',$article['Article']['created']); ?></small>
                <?php endif; ?>
              <?php endforeach; ?>
            <?php endif;  ?>
          </div>
      </div>
    <div class="jumbotron" style="background-color:white; border: none; height: 3cm;"> </div>


