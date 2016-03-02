<div class="container-fluid">
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
              <h4 style="text-align:left; font-size: 18px;"><?php echo __('My Activities'); ?></h4>&nbsp;
            <li><span class="glyphicon glyphicon-user" style="font-size: 20px; color:black;">
                 &nbsp;<?php echo $this->Html->link(__('My Profile'), array('controller'=>
                 'users','action' => 'edit', AuthComponent::user('id')))?></span></li>&nbsp;
            <li><span class="glyphicon glyphicon-cog" style="font-size: 20px; color:black; 
                text-decoration:none;">&nbsp;<?php  echo $this->Html->link(__('Change Password')
                ,array('controller' =>'users','action' => 'reset')); ?></span></li>&nbsp;
            <li><span class="glyphicon glyphicon-list-alt" style="font-size: 20px; color:black;">&nbsp; 
                <?php  echo $this->Html->link(__('My Articles'),array( 'controller' => 'users','action' => 'users_article',AuthComponent::user('id'))); ?></span></li>&nbsp;
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
      <?php echo $this->Form->create('Article', array('novalidate' => true)); ?>
        <h1><?php echo __('Edit Article'); ?> </h1>
          <div class="row">
            <div class="col-sm-9 col-md-8 main">
              <div class="col-sm-9">
              <?php echo $this->Form->input('title',array('class' => 'form-control', 'div' => array(
                     'class' => 'form-group'), 'style' => 'border:none; font-size: 18px;'));
                    echo $this->Form->input(__('category_id'),array('class' => 'form-control','div' => array('class' => 'form-group'))); 
                    echo $this->Form->input('body',array('class' => 'textEditor')); ?>
                <div class="col-sm-5 pull-right"><br>
                <ul class="nav nav-sidebar">
                   <li><?php $options=array(0 =>'Pending',1 =>'Finish');
                          $attributes=array('legend'=>false);
                          echo $this->Form->radio('status',$options,$attributes, array('class' => 'form-control', 'div' => array('class' => 'form-group')));?>
                    </li>        
                    <button class="btn btn-sm btn-primary btn-block" type="submit"> <?php echo __('Save Article'); ?> </button>
                </ul>
              </div>
            </div> 
          </div>
    </div>
  </div> 
  <div class="footer" id="footer" style="text-align:center;">
    <p><?php echo __('@2060 BlogApp.Inc'); ?></p> 
  </div>



