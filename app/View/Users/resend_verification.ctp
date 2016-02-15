<div class="container">
      <?php echo $this->Html->css('signin'); ?>
      <?php echo $this->Flash->render('auth'); ?>
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <div  class="well">
               <h2><?php echo (__('Resend the Email Verification')); ?></h2>
				<p><?php echo (__( 'Please enter the email you used for registration and you\'ll get an email with further instructions.')); ?></p>
				<?php
				echo $this->Form->create('User', array(
					'url' => array(
						'action' => 'resend_verification')));
				echo $this->Form->input('email', array(
					'class' => 'form-control',
					'div' => array('class' => 'form-group'),
					'label' => ('Your Email')));
				?>
			 <button class="btn btn-sm btn-primary btn-block" type="submit">
			 Submit</button>
			 <?php
             echo $this->Form->end();
			  ?>
            </div>    
        </div>   
     </div>   
 </div>   
