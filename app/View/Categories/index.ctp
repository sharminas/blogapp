<div class="container-fluid">
  <div class="row well">
    <div class="col-sm-3 col-md-3">
      <ul class="nav nav-sidebar profile">
        <li>
          <div class="row placeholders" style="margin-left: .25cm;">
            <div class="col-xs-6 col-sm-10 placeholder">
              <span class="glyphicon glyphicon-user" style="font-size: 100px; margin-left: 1cm; color:color:black;"> </span>
                <h5 style="margin-left:.25cm; font-size: 20px;">
                   <?php echo AuthComponent::user('firstname')?>
                   <?php echo AuthComponent::user('lastname')?>
                </h5>  
                <div style="margin-left:.25cm; font-size: 14px;">               
                     <?php echo AuthComponent::user('email')?> &nbsp;
                </div>
            </div>
          </div>
        </li>&nbsp; <hr>
          <h4 style="text-align:left; font-size: 18px;"><?php echo __('My Activities'); ?></h4>&nbsp;
            <li><span class="glyphicon glyphicon-user" style="font-size: 20px; color:black;">
                 &nbsp;<?php echo $this->Html->link(__('My Profile'), array('controller'=>
                 'users','action' => 'edit', AuthComponent::user('id')))?></span></li>&nbsp;
            <li><span class="glyphicon glyphicon-cog" style="font-size: 20px; color:black; 
                text-decoration:none;">&nbsp;<?php  echo $this->Html->link(__('Change Password')
                ,array('controller' =>'users','action' => 'reset')); ?></span></li>&nbsp;
            <li><span class="glyphicon glyphicon-list-alt" style="font-size: 20px; color:black;">&nbsp; <?php  echo $this->Html->link(__('My Articles'),array( 'controller' => 'users','action' => 'users_article',AuthComponent::user('id'))); ?></span></li>&nbsp;
            <li><span class="glyphicon glyphicon-list" style="font-size: 20px; color:black;">
                 &nbsp;<?php  echo $this->Html->link(__('My Genre'),array( 'controller' => 
                 'users','action' => 'users_category',AuthComponent::user('id'))); ?></span></li>  &nbsp;&nbsp;&nbsp;
            <h4 style="text-align:left; font-size: 18px;"><?php echo __('Visit other Author'); ?></h4>&nbsp;
            <li><span class="glyphicon glyphicon-user" style="font-size: 20px; color:black;">
                 &nbsp;<?php echo $this->Html->link(__('View all User'), array('controller'=>
                 'users','action' => 'index'))?></span></li>&nbsp; 
            <h4 style="text-align:left; font-size: 18px;"><?php echo __('Visit other Article'); ?></h4>&nbsp;
            <li><span class="glyphicon glyphicon-edit" style="font-size: 20px; color:black;">
                 &nbsp;<?php echo $this->Html->link(__('Back to Articles'), array('controller'=>
                 'articles','action' => 'index'))?></span></li>&nbsp;      
            <li><span class="glyphicon glyphicon-home" style="font-size: 20px; color:black;">
                 &nbsp;<?php echo $this->Html->link(__('Back to Home'), array('controller'=>
                 'articles','action' => 'home'))?></span></li>&nbsp; 
      </ul>
  </div>
  <div class="col-sm-9 col-md-8 main">
    <?php foreach ($categories as $category): ?>
      <div class="well"> 
        <?php if(AuthComponent::user('id') == $category['Category']['user_id']) :?>
            <h3><?php echo h($category['Category']['title']); ?>  
                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-pencil" style="font-size: 18px; color:color:black;"> </span>'),array('controller' => 'categories','action' => 
                  'edit', $category['Category']['id']),array( 'escape' => false));?>&nbsp;
                  <!-- DELETE -->
                  <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-trash" style="font-size: 18px; color:red;"> </span>'),array('controller' =>'categories','action' =>'delete',
                    $category['Category']['id']),array('confirm' => __('Are you sure you want to delete this User?', $category['Category']['title']),'escape' => false)); ?>
                  &nbsp;
            </h3>
            <p><?php echo $this->Time->format('F j, Y h:i A',$category['Category']['created']); ?>
                &nbsp; by &nbsp; 
               <?php echo $this->Html->link($category['User']['firstname'], array('controller' => 'users',
               'action' => 'view', $category['User']['id'])); ?> 
            <p><?php echo $category['Category']['description'] ?></p>
        <?php endif; ?> 
     </div>
    <?php endforeach; ?>
  </div>
 </div>
</div>



   

