
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4" >
            <div class="col-md-11 col-sm-6">
                <div  class="well" id="edittop">
                <h2><?php echo (__('Reset your password')); ?></h2>
                        <?php
                            echo $this->Form->create('User', array( 
                                'url' => array(
                                    'action' => 'reset',
                                    $token)));
                            echo $this->Form->input('new_password', array(
                                'class' => 'form-control',
                                'div' => array('class' =>'form-group'),
                                'label' => ('New Password'),
                                'type' => 'password'));
                            echo $this->Form->input('confirm_password', array(
                                'class' => 'form-control',
                                'div' => array('class' =>'form-group'),
                                'label' => ('Confirm'),
                                'type' => 'password'));
                      ?>
                <button class="btn btn-sm btn-primary btn-block" type="submit"><?php __('Change Password') ?></button>
                <?php
                    echo $this->Form->end();
                 ?>

            </div>
        </div>  
     </div>   
 </div>   