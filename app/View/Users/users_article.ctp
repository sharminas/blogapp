<div class="container-fluid">
  <div class="row well">
    <div class="col-sm-3 col-md-3">
      <ul class="nav nav-sidebar profile">
        <li>
          <div class="row placeholders" style="margin-left: .25cm;">
            <div class="col-xs-6 col-sm-10 placeholder">
              <span class="glyphicon glyphicon-user" style="font-size: 100px; margin-left: 1cm; color:black;"> </span>
              <h5 style="margin-left:.25cm; font-size: 20px;">
                 <?php echo AuthComponent::user('firstname')?>
                 <?php echo AuthComponent::user('lastname')?>
              </h5>  
            <div style="margin-left:.25cm; font-size: 14px;">               
              <?php echo AuthComponent::user('email')?>
              &nbsp;
            </div>
          </div>
        </div>
        </li>&nbsp; <hr>
         <li><span class="glyphicon glyphicon-user" style="font-size: 20px; color:#00BFFF;"> &nbsp;<?php echo $this->Html->link(__('My Profile'), array('controller'=>'users','action' => 'edit', AuthComponent::user('id')))?></span></li>&nbsp;
        <li><span class="glyphicon glyphicon-cog" style="font-size: 20px; color:#00BFFF; text-decoration:none;">
             <?php  echo $this->Html->link(__('Change Password'), array( 'controller' => 'users','action' => 'reset')); ?></span></li>&nbsp;
         <li><span class="glyphicon glyphicon-list-alt" style="font-size: 20px; color:#00BFFF;">&nbsp;
           <?php  echo $this->Html->link(__('My Articles'),array( 'controller' => 'users','action' => 'users_article',AuthComponent::user('id'))); ?></span></li>&nbsp;
        <li><span class="glyphicon glyphicon-list" style="font-size: 20px; color:#00BFFF;">&nbsp;
           <?php  echo $this->Html->link(__('My Genre'),array( 'controller' => 'users','action' => 'users_category',AuthComponent::user('id'))); ?></span></li>  
        &nbsp;&nbsp;&nbsp;&nbsp; 
    </ul>
  </div>

    <div class="col-sm-9 col-md-8 main pull-left">
    <?php foreach ($user['Article'] as $article): ?>      
        <div class="blog-post well" id="content">
           <div class="blog-actions pull-right">   
            <?php if(AuthComponent::user('id') == $article['user_id']) :?>
                      <!-- EDIT -->
              <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-pencil" style="font-size: 18px; color:black;"> </span>'),array( 'controller' => 'articles', 'action' => 'edit',$article['id']),array('escape' => false));?>
                      <!-- DELETE -->
              <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-trash" style="font-size: 18px; color:red;"> </span>'),array('controller' =>'articles','action' =>'delete',$article['id']),array('confirm' => __('Are you sure you want to delete this User?', $article['title']),'escape' => false)); ?> 
            &nbsp;<?php endif; ?>
          </div>
          <div class="blog-post-title">
            <h2 class="topic"><?php echo $this->Html->link($article['title'],array('controller' =>'articles','action' =>'view',$article['id']));?><small class="author">  by <?php echo $this->Html->link($user['User']['firstname'],array('controller' => 'users', 'action' => 'view', $user['User']['id']));?></small></h2>
            <p style="font-size:11px;"><?php echo $this->Time->format('F j, Y h:i A',$article['created']); ?></p>
          </div>      
          <div class="blog-post-meta" style="text-align:center; color: gray;">
             <?php echo $this->Html->tag('span',$this->Text->truncate($article['body'],250));?>
          </div>
          <p class="conti"><?php echo $this->Html->link(__('Continue Reading...'),array('controller' => 'articles','action' =>'view',$article['id'])); ?>
          <p class="pull-right">
            <button class="glyphicon glyphicon-thumbs-up" class="message" title="I like this Article" name= "#mess" style= "font-size: 22px;color: black; background-color: transparent; border: none;" id='AddButton' value="+">
            </button></a>
               <input type="text" name="TextBox" id="TextBox" style="background-color: transparent; width: 15px; border: none;" value="<?php echo $article['like_num']; ?>" readonly/>
            <button class= "glyphicon glyphicon-thumbs-down" title="I dont like this article" class="message" style="font-size: 22px;color: red; background-color: transparent; border: none;" id='AddButton_dis' value="+">
            </button>
               <input type="text" name="TextBox" id="TextBox_dis" style="background-color:transparent; width: 15px; border: none;" value="<?php echo $article['dislike_num']; ?>" readonly/>
          </p>
        </p>
        </div>
        <?php endforeach;?>
    </div>
  </div>
</div>
 <!-- <div class="jumbotron" style="background-color:black; border: none;">
       <?php //echo $this->element('footer_element_2');?>
  </div> -->
  <div class="footer" id="footer" style="text-align:center;">
       <p> <?php __('@2060 BlogApp.Inc'); ?> </p> 
     <a href="#home" class="paginate"><?php echo __('Back to Top')?></a>
  </div>
