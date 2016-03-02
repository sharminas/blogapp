   <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:black; border:none;">
      <div class="head">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#userNavbar" aria-expanded="false" aria-controls="userNavbar" style="background-color: black; border:none;">
              <span class="sr-only">Toggle navigation</span>
              <span  style="background-color: white;" class="icon-bar"></span>
              <span  style="background-color: white;" class="icon-bar"></span>
              <span  style="background-color: white;" class="icon-bar"></span>
            </button>          
         </div>
         <div id="userNavbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav" style="margin-left: 2cm; background-color:black;">
               <?php if(AuthComponent::user('id')): ?>
                  <li class="dropdown"></li>
                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"><?php echo AuthComponent::user('firstname')
                       ?><span class="caret"></span></a>
                     <ul class="dropdown-menu" style="background-color:white;">
                        <li><?php echo $this->Html->link(__('Add Article'), array('controller'=>'articles','action' => 'add'))?></li>
                        <li><?php echo $this->Html->link(__('Profile'), array('controller'=>'users','action' 
                           => 'profile', AuthComponent::user('id')))?></li>
                        <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users','action' => 'logout'),array('confirm' => __('Are you sure you want to logout?'),'escape'
                           => false));?> </li> 
             
                     </ul>
                  </li> 
               <?php else: ?>
                
                  <li><?php echo $this->Html->link(__('Sign in',true),array('controller' => 'users', 'action' => 'login'));?></li>
                  <li><?php echo $this->Html->link(__('Sign up',true),array('controller' => 'users', 'action' => 'add'));?></li>
               <?php endif; ?> 
            </ul>
            <div style="margin-top: .3cm; margin-right: 1cm;" class="pull-right" id="search">
               <form name="search" id="demo2" method="post"  action="articles/search">
                  <input type="text" name="find" class="Txtbox1" placeholder="<?php echo (__('Search...'));
                     ?>"/><button class= "glyphicon glyphicon-search" style= "font-size: 20px;color: #696969; background-color: transparent; border:none;" id='hide'> </button>
                  <?php  echo $this->Form->end(); ?>

            </div>
         </div>
      </div>
   </nav>
   <div class="container">
      <nav class="navbar navbar-inverse" style="background-color: black; border:none;">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" style="border:none;"  aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="glyphicon glyphicon-home" style="font-size: 23px; color: white; border:none;"></span>
            </button>       
         </div>
         <div id="navbar" class="navbar-collapse collapse">
            <div class="menu"> 
               <ul class="nav navbar-nav" style="margin-left: .-5cm;">
                  <li><?php echo $this->Html->link(__('Home'),array('controller' =>'articles','action'=>
                     'home'));?></li>
                  <li><?php echo $this->Html->link(__('Articles'),array('controller' =>'articles','action'=>
                     'index'));?></li>
                  <li><a href="#about"><?php echo __('About');?></a></li>
                  <li><?php echo $this->Html->link(__('Contact'), array('controller' => 'contacts','action'=> 
                     'add'))?></li>   
               </ul>
            </div>
            <div style="margin-right: .8cm;">
               <div class="menu"> 
                  <ul class="nav navbar-nav navbar-right">
                     <li class="dropdown holder"> 
                        <a class="dropdown-toggle demo" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><?php echo __('ENG');?>
                        
                        <span class="caret"></span></a>
                           <ul class="dropdown-menu" id="myselect">
                               <li><?php echo $this->Html->link(__('POR'),array('controller' =>'languages',
                                 'action'=>'por'));?></li> 
                               <li><?php echo $this->Html->link(__('FRA'),array('controller' =>'languages',
                                 'action'=>'fra'));?></li>
                               <li><?php echo $this->Html->link(__('AFR'),array('controller' =>'languages',
                                 'action'=>'afr'));?></li> 
                               <li><?php echo $this->Html->link(__('ENG'),array('controller' =>'languages',
                                 'action'=>'eng'));?></li>               
                           </ul> 
                     </li>          
                  </ul>
               </div>
            </div>
         </div>
      </nav>
      <div class="row">
         <div class="col-md-offset-4 col-md-4 top" style="margin-top: 1cm;">
            <div class="well">
             	<?php echo $this->Form->create('Contact', array('novalidate' => true)); ?>
                  <h4 style="text-align:center"><?php echo __('Contact Us');?></h4>  
                  <p style="text-align: center;"> <?php echo __('Send your message with us.');?>
                  </p><hr>
                  <?php echo $this->Session->flash(); ?>
            		<?php echo $this->Form->input('name', array('class' => 'form-control','div' =>array( 
                       'class' => 'form-group')));
            			  echo $this->Form->input('email',array('class' => 'form-control','div' => array(
                       'class' => 'form-group')));
            			  echo $this->Form->input('message', array('type' => 'text','rows' => '5', 'cols' 
                       => '40','class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                <button class="btn btn-sm btn-primary btn-block" type="submit"> <?php echo __('Send'); ?>
                </button>
            </div>    
         </div>   
      </div>   
  </div>  
  <div class="jumbotron" style="background-color:white; border: none; height: 10cm;">
  </div>
  <div class="footer" id="footer" style="text-align:center;">
         <p> <?php echo __('@2060 BlogApp.Inc'); ?> </p> 
  </div>
 