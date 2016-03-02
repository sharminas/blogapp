<div class="container">  
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <?php echo $this->Form->create('Comment', array('novalidate' => true)); ?>
          <h3><?php echo __('Add Comment'); ?> </h3>
              <?php echo $this->Form->input('article_id',array('class' => 'form-control','div' 
                    => array('class' => 'form-group')));
                    echo $this->Form->input('name',array('class' => 'form-control','div' =>
                      array('class' => 'form-group')));
                    echo $this->Form->input('email', array('class' => 'form-control','div' => 
                      array('class' => 'form-group')));
                    echo $this->Form->input('comment', array('type' => 'textarea','rows' => '5', 
                      'cols' => '40','class' => 'form-control','div' => array('class' => 'form-group')));
              ?>
    <div>
          <button class="btn btn-sm btn-primary btn-block" type="submit"> <?php echo __('Post my Comment'); ?>
          </button> 
  </div>
</div>
</div>
<div class="jumbotron" style="background-color:white; border: none; height: 10cm;">
</div>
<div class="footer" id="footer" style="text-align:center;">
    <p><?php echo __('@2060 BlogApp.Inc'); ?> </p> 
</div>
