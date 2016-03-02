   

   <div class="container">
      <div class="row">
         <div class="col-md-offset-4 col-md-4 top well" style="margin-top: 2cm;">
               <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-home" 
                style=" font-size: 18px; color:gray;"> </span>'),array('controller' => 'articles',
                'action' =>'home'),array('escape' => false));?>

               <br>
               <div>
                  <h4 style="text-align:center; font-size:26px;"><?php echo __('BlogApp');?></h4>  
                     <p style="text-align: center;"> <?php echo __('Share your ideas with everyone.);');?></p>
                     <hr>
                     <?php echo $this->Session->flash(); ?>

                      <?php echo $this->Form->create(__('User',true), array('novalidate' => true)); ?>
                      <?php echo $this->Form->input(__('email', true), array('class' => 'form-control','div'
                          =>array('class' => 'form-group'))); ?> 
                      <?php echo $this->Form->input(__('password',true), array('class' => 'form-control','div'
                          =>array( 'class' => 'form-group'))); ?>
                      <?php echo $this->Form->input('auto_login',array('type'=>'checkbox', 'label' =>'Keep me logged in','div' => array('class' => 'form-group'))); ?>
                     <div class="col-sm-11">
                         <button class="btn btn-sm btn-primary btn-block" type="submit">
                         <?php echo __('Submit')?></button>
                         <?php  echo $this->Form->end(); ?><br>
                     </div>
                        <p class="pull-right log">
                            <?php  echo $this->Html->link(__('Forgot password',true), array( 'controller' => 'users' ,'action' => 'reset')); ?>&nbsp;&nbsp;
                        </p>
                        <p class="pull-left log">
                             <?php  echo $this->Html->link(__('Sign up',true), array( 'controller' => 'users',
                               'action' => 'add')); ?>
                        </p> 
                     &nbsp; &nbsp; &nbsp; 
               </div>
      </div>
   </div>   
   </div>  
   <div class="jumbotron" style="background-color:white; border: none; height: 10cm;">
   </div>
   <div class="footer" id="footer" style="text-align:center;">
     <p><?php echo  __('@2060 BlogApp.Inc'); ?> </p> 
   </div>

