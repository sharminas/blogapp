         
        <div class="sidebar" style="background-color:#F5F5F5;">
          <h4 class="style"><?php echo __('Ads') ?></h4>
              <div class="sideli">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                          <?php echo $this->Html->image('http://localhost/blogapp/app/webroot/img/ads.jpg', array('alt' => 'test', 'border' => '0')); ?>
                    </div>
                    <div class="item">
                         <?php echo $this->Html->image('http://localhost/blogapp/app/webroot/img/ads.jpg', array('alt' => 'test', 'border' => '0')); ?>
                    </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
               </div>
        </div>
        <div class="sidebar">
          <h4 class="style" id="hide1"><?php  echo __('Archives') ?> </h4>
            <div class="sideli">
              <ul class="list-unstyled header"  id="hidden">
                  <li><?php echo $this->Html->link(__('March 2016'),array('controller' => 'articles',
                             'action' =>'index_filter','?' => array('month'=>3))); ?></li>
                  <li><?php echo $this->Html->link(__('February 2016'),array(
                             'controller' => 'articles', 'action' =>'index_filter', '?' => array('month' => 2)));?></li>
                  <li><?php echo $this->Html->link(__('January 2016'),array(
                             'controller' => 'articles', 'action' =>'index_filter','?' => array('month' => 1))); ?></li>
                  <li><?php echo $this->Html->link(__('December 2015'),array('controller' => 'articles', 
                             'action' =>'index_filter','?' =>array('month' => 12))); ?></li>
              </ul>
            </div>
          </div>
          <div class="sidebar">
            <h4 class="style" id="hide1"><?php echo __('Category') ?></h4>
              <div class="sideli">
                <ul class="list-unstyled header" id="hidden1">
                  <li><?php echo $this->Html->link(__('Technology'),array('controller' => 'articles','action' =>'index_filter','?' => array('cat_id'=>1)));?> </li>
                  <li><?php echo $this->Html->link(__('Science and Health'),array('controller' => 'articles','action' =>'index_filter','?' => array('cat_id'=>2))); ?> </li>
                    <li><?php echo $this->Html->link(__('Programming'),array('controller' => 'articles','action' =>'index_filter','?' => array('cat_id'=>4))); ?> </li>
                  <li><?php echo $this->Html->link(__('Random Articles'),array('controller' => 'articles','action'=>'index_filter','?' => array('cat_id'=>3)));?></li>
                </ul>
            </div>
          </div>
          <div class="sidebar">
            <h4 class="style"><?php echo __('Popular Articles') ?></h4>
              <div class="sideli">
                <ul class= "list-unstyled header" id= "hidden1">
                  <li style="font-size:12px; color: gray;">
                    <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' => 'view', $article['Article']['id']));?> &nbsp;
                    <?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],150));?>
                  </li>
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
                    <small><?php echo $this->Time->format('F j, Y h:i A',$article['Article']['created']); ?></small>
                    <?php endif; ?>
                  <?php endforeach; ?>
                <?php endif;  ?>
              </div>
         </div>



