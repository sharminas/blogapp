<div class="container">
    <div class="row">
        <div class="col-sm-8 top well ">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img class="first-slide" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption">
                          <h1>Example headline.</h1>
                          <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                          <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                        </div>
                    </div>
                  </div>
                  <div class="item">
                    <img class="second-slide" alt="Second slide">
                      <div class="container">
                          <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                          </div>
                      </div>
                  </div>
              </div>
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only"><?php __('Previous'); ?></span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only"><?php __('Next'); ?></span>
              </a>
            </div>
        </div>
        <div class="col-md-4 blog-sidebar">
        <h2 style="text-align: center;"> <?php  echo __('Create your Account'); ?> </h2>
           <p style="text-align: center;"> <?php echo  __('Create your Article Now,.');?></p>
              <hr>
              <?php echo $this->Form->create('User', array('novalidate' => true)); 
                    echo $this->Form->input(__('email',true), array('class' => 'form-control','div' => array(
                       'class' => 'form-group'),'label' => ('E-mail <span style=color:red>* </span>')));
                    echo $this->Form->input(__('password',true), array('class' => 'form-control','div' => array(
                       'class' => 'form-group'),'label' => 'Password <span style=color:red>* </span>',
                       'type' => 'password'));
                     echo $this->Form->input(__('password2',true), array('class' => 'form-control','div' => array(
                       'class' => 'form-group'),'label' => ('Confirm Password <span style=color:red>*</span>'),
                       'type' => 'password'));
                ?>
              <?php echo $this->Form->input(__('firstname',true), array('class' => 'form-control','div' => array(
                       'class' => 'form-group'),'label' => ('Firstname <span style=color:red>* </span>'))); 
                    echo $this->Form->input(__('lastname',true), array('class' => 'form-control','div' => array( 
                       'class' => 'form-group'),'label' => ('Lastname <span style=color:red>* </span>'))); 
                    echo $this->Form->input(__('address',true), array('class' => 'form-control','div' => array(
                       'class' => 'form-group'))); 
                    $options=array('M'=>'Male','F'=>'Female');
                    $attributes=array('legend'=>false);
                    echo $this->Form->radio('gender',$options,$attributes, array(
                       'class' => 'form-control','div' => array('class' => 'form-group'),
                       'label' => 'Gender:'));?>
                     <button class="btn btn-sm btn-primary btn-block resize" type="submit"><?php echo __('Sign In')?></button>
              <?php echo $this->Form->end();?>
         </div> 
      </div> 
   </div>              
</div>
<div class="jumbotron" style="background-color:white; border: none; height: 10cm;">
</div>
<div class="footer" id="footer" style="text-align:center;">
       <p> <?php __('@2060 BlogApp.Inc'); ?> </p> 
</div>