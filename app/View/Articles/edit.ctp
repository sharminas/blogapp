<div class="container-fluid">
  <?php echo $this->Form->create('Article', array('novalidate' => true)); ?>
    <h1><?php echo __('Edit Article'); ?> </h1>
      <div class="row well">
        <div class="col-sm-3 col-md-3">
          <ul class="nav nav-sidebar">
              <li><?php echo $this->Form->input(__('category_id'),array('class' => 'form-control','div' => array('class' => 'form-group'))); ?>
              </li>
              <li><?php $options=array(0 =>'Pending',1 =>'Finish');
                        $attributes=array('legend'=>false);
                  echo $this->Form->radio('status',$options,$attributes, array('class' => 'form-control','div' => array('class' => 'form-group')));?>
              </li>        
              <button class="btn btn-sm btn-primary btn-block" type="submit"> <?php echo __('Save Article'); ?>
              </button>    
              &nbsp;&nbsp;&nbsp;&nbsp; 
          </ul>
        </div>
      <div class="col-sm-9 col-md-8 main">
           <?php echo $this->Form->input('title',array('class' => 'form-control', 'div' => array(
               'class' => 'form-group'), 'style' => 'border:none; font-size: 18px;'));
                echo $this->Form->input('body',array('class' => 'form-control','div' => array(
                'class' => 'form-group'), 'style' => 'border:none;')); ?>
       </div>
     </div>
</div>



