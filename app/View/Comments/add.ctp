<div class="container">  
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <?php echo $this->Form->create('Comment', array('novalidate' => true)); ?>
        <div id='edittop'>
          <h3><?php echo __('Add Comment'); ?> </h3>
            <?php echo $this->Form->input('article_id',array('class' => 'form-control','div' => 
                    array('class' => 'form-group')));
                  echo $this->Form->input('name',array('class' => 'form-control','div' =>
                    array('class' => 'form-group')));
                  echo $this->Form->input('email', array('class' => 'form-control','div' => 
                    array('class' => 'form-group')));
                  echo $this->Form->input('comment', array('type' => 'text','style' => 'height: 100px',
                    'class' => 'form-control','div' => array('class' => 'form-group')));
              ?>
        </div>
      <button class="btn btn-sm btn-primary btn-block" type="submit"> <?php echo __('Post my Comment'); ?> </button> 
    </div>
  </div>
</div>   