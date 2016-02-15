<div class="container">
      <?php echo $this->Html->css('signin'); ?>
      <?php echo $this->Flash->render('auth'); ?>
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <div  class="well">
                <h3><?php echo (__('Forgot your password?')); ?></h3>
				<p><?php echo __( 'Please enter the email you used for registration and you\'ll get an email with further instructions.'); ?></p>
				<?php
				    echo $this->Form->create('User', array('novalidate' => true )); 
					echo $this->Form->create(__('User'), array( 'url' => array('action' => 'reset')));
					echo $this->Form->input(__('email'), array(	'class' => 'form-control','div' => array(
					  'class' => 'form-group'),	'label' =>('Your Email')));
				?>
			    <button class="btn btn-sm btn-primary btn-block" type="submit"> Send my New password</button>
			    <?php  echo $this->Form->end();  ?>
            </div>    
        </div>   
     </div>   
 </div>   
