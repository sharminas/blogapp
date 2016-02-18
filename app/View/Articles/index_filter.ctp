
    <div class="container">
      <div class="row">
        <div class="col-sm-9 blog-main">
          <?php if($articles):?>
            <?php foreach ($articles as $article): ?>     
            <div class="blog-post" id="content">
              <div class="blog-actions pull-right">
                <?php if(AuthComponent::user('id') == $article['Article']['user_id']) :?>
                          <!-- EDIT -->
                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-pencil" style="font-size: 18px; color:gray;"> </span>'),array(  'controller' => 'articles', 'action' => 'edit',$article['Article']['id']),array('escape' => false));?>
                          <!-- DELETE -->
                <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-trash" style="font-size: 18px; color:red;"> </span>'),array('controller' =>'articles','action' =>'delete',$article['Article']['id']),array('confirm' => __('Are you sure you want to delete this article?', $article['Article']['title']),'escape' => false)); ?>
                    &nbsp;<?php endif; ?>
              </div>
              <div class="blog-post-title">                
                <h2 class="topic"><?php echo $this->Html->link(__($article['Article']['title'],true),array('controller' => 'articles','action' =>'view',$article['Article']['id']));?>
                  <small class="author" title=" I'm <?php echo  $article['User']['firstname']?>, <?php echo $article['User']['about'] ?> <br> please visit and read my article" data-toggle="popover1" data-placement="right"> by : <?php echo $this->Html->link($article['User']['firstname'],array('controller' => '#', 'action' => '#', $article['User']['id']));?></small>
                </h2>
                <p style="font-size: 11px;"><?php echo $this->Time->format('F j, Y h:i A',$article['Article']['created']); ?>
                </p>                
              </div>
              <div class="blog-post-meta" style="text-align:center; color: gray;">
                  <?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],350));?>
              </div>
                <p class="conti"><?php echo $this->Html->link(__('Continue Reading...'),array('controller' => 'articles','action' =>'view',$article['Article']['id'])); ?></p>
                <hr style="border: 1px solid #DCDCDC">
            </div>
            <?php endforeach;?>
        <?php else:?>
              <p class="p"><?php echo(__("No Articles Found")); ?></p>
        <?php endif;?>
        </div>&nbsp;&nbsp; &nbsp; 
         <div class="col-sm-3 blog-sidebar">
           <?php echo $this->Element('side_bar_search');?>
         </div>
      </div>
    </div> 
  </div>
    <div class="jumbotron" style="background-color:white; border: none; height: 3cm;">
    </div>
     <div class="jumbotron" style="background-color:black; border: none;">
           <?php echo $this->element('footer_element');?>
      </div>
      <div class="footer" id="footer" style="text-align:center;">
          <p> <?php __('@2060 BlogApp.Inc'); ?> </p>  
         <a href="#home" class="paginate"><?php echo __('Back to Top')?></a>
      </div>
     