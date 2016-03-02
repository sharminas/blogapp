
   <div class="container">
      <div class="row">
         <div class="col-sm-8">
            <h2 style="color:gray; text-align:center;"><?php echo __('Your idea needs a great blog'); ?>
               <p style="font-size: 18px;"><br><?php echo __('Your audience is waiting, share your blog with the world.') ?></p>
            <hr>&nbsp;</h2>
         <div class="col-sm-8"><br>
            <h5 style="font-size:24px;"><?php echo (__('Join us now.')); ?></h5>
               <p style="color:#353839;"> 
                  <?php echo (__('Join us now, and create your article wherever, whenever you are.')); ?></p>
                  <br><br><br>
            <h5 style="font-size:24px;"><?php echo (__('Create your Article for Free.')); ?></h5>
               <p style="color:#353839;">
                  <?php echo (__('Tell something about yourself, the world and universe')); ?></p><br><br><br>
            <h5 style="font-size:24px;"><?php echo (__('BlogApp world')); ?></h5>
               <p style="color:#353839;"> <?php echo (__('Read, Write, Comment, Like, and Unlike different Article')); ?></p><br>
         </div>
      </div>
      <div class="col-md-4 blog-sidebar well rcorners">
         <h2 style="text-align: center; color: black;"> <?php  echo __('Create your Account'); ?> </h2>
            <p style="text-align: center;"> <?php echo  __('Create your Article Now,.');?></p>
            <hr>
            <?php echo $this->Session->flash(); ?>

               <?php echo $this->Form->create('User', array('novalidate' => true)); ?>
               <?php echo $this->Form->input(__('email',true), array('class' => 'form-control','div' => 
                       array( 'class' => 'form-group'),'placeholder' => ('sample@sample.com')));
                     echo $this->Form->input(__('password',true), array('class' => 'form-control','div' => 
                       array('class' => 'form-group'),'label' => 'Password <span style=color:red>* </span>',
                       'placeholder' => '*********','type' =>  'password'));
                     echo $this->Form->input(__('password2',true), array('class' => 'form-control','div' => array('class' => 'form-group'),'label' => ('Confirm Password <span style=color:red>*
                        </span>'),'placeholder' => '*********', 'type' => 'password')); ?>
               <?php echo $this->Form->input(__('firstname',true), array('class' => 'form-control','div' =>      array('class' => 'form-group'),'label' => ('Firstname <span style=color:red>* 
                        </span>'))); 
                     echo $this->Form->input(__('lastname',true), array('class' => 'form-control','div' => array('class' => 'form-group'),'label' => ('Lastname <span style=color:red>* 
                        </span>'))); 
                     echo $this->Form->input(__('address',true), array('class' => 'form-control','div' => 
                        array( 'class' => 'form-group'))); ?>
               <?php  $options=array('M'=> 'Male','F'=> 'Female');
                     $attributes=array('legend'=>false);
                     echo $this->Form->radio('gender',$options,$attributes);  ?>

               <div class="col-sm-6 pull-right">
                  <button class="btn btn-sm btn-primary btn-block resize" type="submit"><?php echo __('Sign In')?></button> 
               </div>
               <?php echo $this->Form->end();?>
         </div> 
      </div> 
   </div>              
   <div class="jumbotron" style="background-color: transparent; border: none; height: 5cm;">
   </div>
   <div class="footer" id="footer" style="text-align:center;">
      <p> <?php echo  __('@2060 BlogApp.Inc'); ?> </p> 
   </div>