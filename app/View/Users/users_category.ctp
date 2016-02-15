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
         <li><span class="glyphicon glyphicon-user" style="font-size: 20px; color:#ff471a;"> &nbsp;<?php echo $this->Html->link(__('My Profile'), array('controller'=>'users','action' => 'edit', AuthComponent::user('id')))?></span></li>&nbsp;
        <li><span class="glyphicon glyphicon-cog" style="font-size: 20px; color:#ff471a; text-decoration:none;">
             <?php  echo $this->Html->link(__('Change Password'), array( 'controller' => 'users','action' => 'reset')); ?></span></li>&nbsp;
         <li><span class="glyphicon glyphicon-list-alt" style="font-size: 20px; color:#ff471a;">&nbsp;
           <?php  echo $this->Html->link(__('My Articles'),array( 'controller' => 'users','action' => 'users_article',AuthComponent::user('id'))); ?></span></li>&nbsp;
        <li><span class="glyphicon glyphicon-list" style="font-size: 20px; color:#ff471a;">&nbsp;
           <?php  echo $this->Html->link(__('My Genre'),array( 'controller' => 'users','action' => 'users_category',AuthComponent::user('id'))); ?></span>
        </li>
    </ul>
  </div>
   <div class="col-sm-9 col-md-8 main">
    <?php foreach ($user['Category'] as $category): ?>      
        <div class="blog-post well" id="content">
          <div class="blog-post-title">
            <div class="pull-right">
             <?php if(AuthComponent::user('id') == $category['user_id']) :?>
                      <!-- EDIT -->
                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-pencil" style="font-size: 18px; color:black;"> </span>'),array( 'controller' => 'categories', 'action' => 'edit',$category['id']),array('escape' => false));?>
                      <!-- DELETE -->
                <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-trash" style="font-size: 18px; color:red;"> </span>'),array('controller' =>'categories','action' =>'delete',$category['id']),array('confirm' => __('Are you sure you want to delete this User?', $category['title']),'escape' => false)); ?> 
                &nbsp;<?php endif; ?>
            </div>
            <h2 class="topic"> <?php echo $this->Html->link($category['title'],array('controller' => 'categories','action' =>'view',$category['id']));?>
            </h2>
          </div>      
          <div class="blog-post-meta">
             <?php echo $this->Html->tag('span',$this->Text->truncate($category['description'],-1));?>
          </div>
          <p class="conti"><?php echo $this->Html->link(__('Continue Reading...'),array('controller' => 'categories','action' =>'view',$category['id'])); ?></p>
        </div>
        <?php endforeach;?>
    </div>
  </div>
</div>
 <!-- <div class="jumbotron" style="background-color:black; border: none;">
       <?php //echo $this->element('footer_element_2');?>
  </div> -->
  <div class="jumbotron" style="background-color:white; border: none; height: 10cm;">
  </div>
  <div class="footer" id="footer" style="text-align:center;">
       <p> <?php __('@2060 BlogApp.Inc'); ?> </p> 
     <a href="#home" class="paginate"><?php echo __('Back to Top')?></a>
  </div>
 