
<div class="container">
   <div class="row">
      <div class="col-md-offset-4 col-md-4 top">
         <div class="well">
            <h4><?php echo __('BlogApp');?></h4>  
            <p style="text-align: center;"> <?php echo __('Share your ideas with everyone.);');?></p>
               <hr>
                 <?php echo $this->Form->create(__('User',true), array('novalidate' => true)); ?>
                 <?php echo $this->Form->input(__('email', true), array('class' => 'form-control','div'=>array(
                       'class' => 'form-group'))); ?> 
                 <p class="pull-right">
                    <?php  echo $this->Html->link(__('Forgot password',true), array('controller' => 'users',
                        'action' => 'reset')); ?>
                 </p>
                 <?php echo $this->Form->input(__('password',true), array('class' => 'form-control','div' => array( 'class' => 'form-group'))); ?>
                 <?php echo $this->Form->input('auto_login',array('type'=>'checkbox', 'label' =>'Keep me logged in','div' => array('class' => 'form-group'))); ?>
               <button class="btn btn-sm btn-primary btn-block" type="submit">
                 <?php echo __('Submit')?>
               </button>
               <?php  echo $this->Form->end(); ?>
         </div>    
      </div>   
   </div>   
</div>  
<div class="jumbotron" style="background-color:white; border: none; height: 10cm;">
</div>
<div class="footer" id="footer" style="text-align:center;">
       <p> <?php __('@2060 BlogApp.Inc'); ?> </p> 
</div>
 
</div>
