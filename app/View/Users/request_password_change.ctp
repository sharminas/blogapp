
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 top">
          <div class="well">
                <h4 style="text-align: center;"><?php echo (__('Forgot your password?')); ?><hr></h4>
					<p style="text-align: center;"><?php echo __( 'Please enter the email you used for registration and you\'ll get an email with further instructions.'); ?></p>
						<?php echo $this->Form->create('User', array('novalidate' => true )); 
							  echo $this->Form->create(__('User'), array( 'url' => array('action' => 'reset')));
							  echo $this->Form->input(__('email'), array(	'class' => 'form-control','div' => array('class' => 'form-group'),	'label' =>('Your Email')));
						?>
					<button class="btn btn-sm btn-primary btn-block" type="submit"> <?php echo __('Send my New password'); ?>
					</button>
					 <?php  echo $this->Form->end();  ?>
            </div>
        </div>   
    </div>   
</div>  
<div class="jumbotron" style="background-color:white; border: none; height: 10cm;">
</div>
<div class="footer" id="footer" style="text-align:center;">
  <p><?php echo  __('@2060 BlogApp.Inc'); ?> </p> </div>

