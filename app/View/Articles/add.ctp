<?php echo $this->Form->create('Article', array('novalidate' => true)); ?>
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
           <?php  echo $this->Html->link(__('My Genre'),array( 'controller' => 'users','action' => 'users_category',AuthComponent::user('id'))); ?></span></li>
        <h3><?php echo __('Save Article') ?></h3>
        <li><?php echo $this->Form->input('category_id',array('class' => 'form-control','div' => array('class' => 'form-group'))); ?>
        </li>
        <li><?php $options=array(0 =>'Pending',1 =>'Finish'); $attributes=array('legend'=>false);
            echo $this->Form->radio('status',$options,$attributes, array('class' => 'form-control','div' => 
            array('class' => 'form-group')));?>
        </li>        
        <button class="btn btn-sm btn-primary btn-block" type="submit"> Save Article</button>    
        &nbsp;&nbsp;&nbsp;&nbsp; 
    </ul>
  </div>
  <div class="col-sm-9 col-md-8">
    <h1><?php echo __('Add Article'); ?> </h1>
      <ul class="nav nav-sidebar">
        <?php echo $this->Form->input(__('title',true),array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
      </ul>
        <?php echo $this->Form->input('body',array('class' => 'form-control','div' => array('class' =>
          'form-group'))); ?>
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