
<div class="container">
  <div class="row">
    <div class="col-sm-9">
      <div class="blog-post" id="content">
        <div class="blog-actions pull-right">
          <?php if(AuthComponent::user('id') == $article['Article']['user_id']) :?>
              <!-- EDIT -->
              <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-pencil" style="font-size: 18px; color:black;"> </span>'),array(  'controller' => 'articles', 'action' => 'edit',$article['Article']['id']),array('escape' => false));?>
              <!-- DELETE -->
              <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-trash" style="font-size: 18px; color:red;"> </span>'),array('controller' =>'articles','action' =>'delete',$article['Article']['id']),array('confirm' => __('Are you sure you want to delete this article?', $article['Article']['title']),'escape' => false)); ?> 
               &nbsp;
          <?php endif; ?>
        </div>
        <div class="blog-post-title">                
            <h2 class="topic"><?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' =>'view',$article['Article']['id']));?><small class="author"> by : <?php echo $this->Html->link($article['User']['firstname'],array('controller' => 'users', 'action' => 'view', $article['User']['id']));?></small>
            </h2>
            <p style="font-size: 11px;"><span class="glyphicon glyphicon-time">&nbsp;<?php echo __('Posted: ');?><?php echo $this->Time->format('F j, Y',$article['Article']['created']); ?></span></p>                
        </div>
        <p style="text-align:center; color: gray;"><?php echo $article['Article']['body'] ?></p>&nbsp;
      </div>
      <div>
        <h3 class="style" style="color:#F92672"> <?php  echo __('Related Articles'); ?> </h3>
          <ul class="list-unstyled side topic">
                <?php if($articles): ?>
                  <?php if($article['Category']['id'] && $article['Article']['category_id'] == 1):?>
                    <?php foreach ($articles as $article): ?>
                      <?php if($article['Category']['id'] && $article['Article']['category_id'] == 1):?>
                      <li style="font-size:12px; color: gray;">
                        <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' => 'view', $article['Article']['id']));?> &nbsp;
                        <?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],150));?> 
                      </li>
                      <?php endif; ?>
                    <?php endforeach;?>
                  <?php elseif($article['Category']['id'] && $article['Article']['category_id'] == 2):?>
                    <?php foreach ($articles as $article): ?>
                      <?php if($article['Category']['id'] && $article['Article']['category_id'] == 2):?>
                        <li style="font-size:12px; color: gray;">
                          <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' => 'view', $article['Article']['id']));?> &nbsp;
                          <?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],150));?>
                        </li>
                        <?php endif; ?>
                      <?php endforeach;?>
                    <?php elseif($article['Category']['id'] && $article['Article']['category_id'] == 3):?>
                      <?php foreach ($articles as $article): ?>
                        <?php if($article['Category']['id'] && $article['Article']['category_id'] == 3):?>
                          <li style="font-size:12px; color: gray;">
                            <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' => 'view', $article['Article']['id']));?> &nbsp;
                            <?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],150));?>
                          </li>
                        <?php endif; ?>
                      <?php endforeach;?>
                    <?php else:?>
                        <?php echo 'No related Article'?>
                    <?php endif;?>
                <?php endif; ?>
              </ul><br> 
        <h5 class="topic">
            <?php echo $this->Html->link(__('Add Comment'),array('controller'=>'comments','action'=>
                'add',  $article['Article']['id']));?>
            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-comment" style="font-size:22px; color:black;"></span>'),array('controller' =>  'comments', 'action' =>'add',$article['Article']['id']),array('escape' => false)); ?> 
              <!--   <?php //"remind me to test this"?> -->
              <a title="To like this article, please login" data-toggle="popover" data-placement="bottom">
                <button class= "glyphicon glyphicon-thumbs-up message" title="I like this article" style="font-size: 22px; color: black; background-color: white; border:none;" id='AddButton' value="+">
                </button></a>
                <input type="text" name="like" id="like" style="background-color: white; width: 15px; border: none;" value="<?php echo $article['Article']['like_num']; ?>" readonly/>
                 <!-- dislike -->
              <a title="To unlike this article,Please login" data-toggle="popover" data-placement="bottom">
                <button class= "glyphicon glyphicon-thumbs-down message"  title="I dont like this article" style="font-size: 22px; color: red; background-color: white; border: none;" id='AddButton_dis' value="+"></button></a>
                <input type="text" name="dislike" id="dislike" style="background-color: white; width: 15px; border: none;" value="<?php echo $article['Article']['dislike_num']; ?>" readonly/>
                <!-- view -->
                <button class= "glyphicon glyphicon-eye-open" style="font-size: 22px; color: gray;background-color: white; border: none;" id='AddButton_dis' value="+" disabled></button>
                <input type="text" name="dislike" id="dislike" style="background-color: white; color: gray;
                     width: 18px; border: none;" value="<?php echo $article['Article']['id']; ?>" readonly/>
        </h5>
             <?php echo $this->element('add_comment'); ?> 
      </div>
      </div>
      <div class="col-sm-3 side">
           <?php echo $this->Element('side_bar');?>
      </div>
   </div>
</div>
<div class="jumbotron" style="background-color:white; border:none; height:3cm;"></div>
<div class="jumbotron" style="background-color:black; border: none;">
    <?php echo $this->element('footer_element');?>
</div>
  <div class="footer" id="footer" style="text-align:center;">
     <p> <?php echo  __('@2060 BlogApp.Inc'); ?> </p> 
     <a href="#home" class="paginate"><?php echo __('Back to Top')?></a>
  </div>