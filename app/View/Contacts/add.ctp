    
    <div class="container">
       <div class="row">
          <div class="col-md-offset-4 col-md-4 top">
             <div class="well">
             	<?php echo $this->Form->create('Contact', array('novalidate' => true)); ?>
                <h4><?php echo __('Contact Us');?></h4>  
                <p style="text-align: center;"> <?php echo __('Send your message with us.');?></p>
                  <hr>
            			<?php echo $this->Form->input('name', array('class' => 'form-control','div' => array(
                       'class' => 'form-group')));
            				    echo $this->Form->input('email',array('class' => 'form-control','div' => array(
                        'class' => 'form-group')));
            				    echo $this->Form->input('message', array( 'type' => 'textbox','class' => 'form-control', 
            				    'div' => array('class' => 'form-group')));?>
                <button class="btn btn-sm btn-primary btn-block" type="submit"> <?php echo __('Send'); ?></button>
             </div>    
          </div>   
       </div>   
    </div>  
    <div class="jumbotron" style="background-color:white; border: none; height: 10cm;">
    </div>
    <div class="footer" id="footer" style="text-align:center;">
         <p> <?php echo __('@2060 BlogApp.Inc'); ?> </p> 
    </div>
