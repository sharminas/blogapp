<div class="container-fluid">
  <?php echo $this->Form->create('Category', array('novalidate' => true)); ?>
    <h1><?php echo __('Add Category'); ?></h1>
      <div class="row well">
        <div class="col-sm-3 col-md-3">
          <ul class="nav nav-sidebar">      
              &nbsp;&nbsp;&nbsp;&nbsp; 
                <button class="btn btn-sm btn-primary btn-block" type="submit">Save Category</button>
          </ul>
        </div>
      <div class="col-sm-9 col-md-8 main">
            <?php echo $this->Form->input('title', array('class' => 'form-control',
                'div' => array('class' => 'form-group')));
                echo $this->Form->input('description', array('class' => 'form-control',
                'div' => array('class' => 'form-group')));?>
       </div>
     </div>
</div>