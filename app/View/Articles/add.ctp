
<?php echo $this->Form->create('Article', array('novalidate' => true)); ?>
<div class="container-fluid">
   <div class="row well">
      <div class="col-sm-3 col-md-3">
        <div class="col-sm-12">
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-10 placeholder">
              <span class="glyphicon glyphicon-user" style="font-size: 100px; margin-left: 1cm; color:black;"> </span>
                <h5 style="margin-left:.25cm; font-size: 20px;">
                   <?php echo AuthComponent::user('firstname')?>
                  <?php echo AuthComponent::user('lastname')?>
                </h5>  
                <div style="margin-left:.25cm; font-size: 14px;">               
                  <?php echo AuthComponent::user('email')?> &nbsp;
                </div>
            </div>
          </div>
        </div>
        <ul class="nav nav-sidebar profile" > &nbsp; <hr>
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
                 'user','action' => 'index'))?></span></li>&nbsp; 
            <h4 style="text-align:left; font-size: 18px;"><?php echo __('Visit other Article'); ?></h4>&nbsp;
            <li><span class="glyphicon glyphicon-edit" style="font-size: 20px; color:black;">
                 &nbsp;<?php echo $this->Html->link(__('Back to Articles'), array('controller'=>
                 'articles','action' => 'index'))?></span></li>&nbsp;      
            <li><span class="glyphicon glyphicon-home" style="font-size: 20px; color:black;">
                 &nbsp;<?php echo $this->Html->link(__('Back to Home'), array('controller'=>
                 'articles','action' => 'home'))?></span></li>&nbsp; 
        </ul>
      </div>
      <div class="col-sm-9 col-md-8">
        <?php echo $this->Session->flash(); ?>
          <h3 class="font"><?php echo __('Add Article'); ?> </h3>
            <div class=" col-sm-11">
              <div class="col-sm-12">
                <ul class="nav nav-sidebar">
                  <li><?php echo $this->Form->input('category_id',array('class' => 'form-control','div' => array('class' => 'form-group'))); ?></li>
                     <?php echo $this->Form->input(__('title',true),array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </ul>
                <div>
                  <?php echo $this->Form->input('body',array('class' => 'textEditor', 'div' => array('class' => 'form-group'))); ?>
                </div>
              </div> 
              <div class="col-sm-3 pull-right">   
                 <?php $options=array(0 =>'Pending',1 =>'Finish'); 
                        $attributes=array('legend'=>false);
                        echo $this->Form->radio('status',$options,$attributes);?>
                  <button class="btn btn-sm btn-primary btn-block" type="submit"> Save Article
                  </button>
              </div>   
            </div><hr>
            <div class="col-sm-12">
             <?php if($articles):?>
              <?php foreach ($articles as $article): ?>     
                <div class="blog-post" id="content">
                  <div class="blog-post-title">                
                    <h2 class="topic">
                      <?php echo $this->Html->link(__($article['Article']['title'],true), array('controller' 
                          => 'articles','action' =>'view',$article['Article']['id']));?>
                      <small class="author" title=" I'm <?php echo  $article['User']['firstname']?>,
                          <?php echo $article['User']['about'] ?> <br> please visit and read my article" data-toggle="popover1" data-placement="right"> by : <?php echo 
                          $this->Html->link($article['User']['firstname'],array('controller' => '#', 
                          'action' => '#', $article['User']['id']));?></small> 
                    </h2>
                    <p style="font-size: 11px;"><span class="glyphicon glyphicon-time">&nbsp;<?php echo __('Posted ');?> <?php echo $this->Time->format('F j, Y',$article['Article']['created']); ?></p></span>                
                  </div>
                  <div class="blog-post-meta" style="text-align:center; color: black;">
                    <?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],200));?>
                  </div>
                  <p class="conti"><?php echo $this->Html->link(__('Continue Reading...'),array('controller' 
                     =>'articles','action' =>'view',$article['Article']['id'])); ?></p>
                  <hr style="border: 1px solid #DCDCDC">
                </div>
              <?php endforeach;?>
              <?php else:?>
                  <p class="p"><?php echo(__("No Articles Found")); ?></p>
              <?php endif;?>
                <div class="pull-left paginate">
                  <?php echo $this->Paginator->prev('<< ' . __('previous'), array() , null,  array('actions' 
                   => 'prev_next')); ?>&nbsp;
                </div>
                <div class="pull-right paginate">
                  <?php echo $this->Paginator->next(__('next') .' >>', array(),null,array('actions' => 
                   'prev_next'));?>
                </div> 
            </div> &nbsp;&nbsp; 
        </div>
      </div>
   </div>
</div>
<div class="jumbotron" style="background-color:white; border: none; height: 3cm;"></div>
<div class="footer" id="footer" style="text-align:center;">
   <p> <?php __('@2060 BlogApp.Inc'); ?> </p> 
   <a href="#blogapp" class="paginate"><?php echo __('Back to Top')?></a>
