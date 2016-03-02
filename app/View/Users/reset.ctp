
<div class="container">
  <div class="row">
    <div class="col-md-offset-4 col-md-4" style="background-color:white;">
      <div class="col-md-11 col-sm-6 well">
        <h4 style="text-align:center;"><?php echo (__('Reset your password')); ?><hr></h4>
          <?php echo $this->Form->create('User', array('url' => array('action' => 'reset',$token)));
                echo $this->Form->input('new_password', array( 'class' => 'form-control','div' => array('class' =>'form-group'),  'label' => ('New Password'), 'type' => 'password'));
                echo $this->Form->input('confirm_password', array('class' => 'form-control', 'div' => array('class' =>'form-group'),'label' => ('Confirm'), 'type' => 'password'));  ?>
        <button class="btn btn-sm btn-primary btn-block" type="submit"><?php echo __('Change Password') ?></button>   
        <?php echo $this->Form->end();?>   
      </div>  
    </div>  
  </div> 
 </div>   
<div class="jumbotron" style="background-color:white; border: none; height: 10cm;">
</div>
<div class="footer" id="footer" style="text-align:center;">
  <p><?php echo  __('@2060 BlogApp.Inc'); ?> </p> 
</div>