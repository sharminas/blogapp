   
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
                  <ul class="nav navbar-nav" style="margin-left: -.5cm;">
                     <li><?php echo $this->Html->link(__('Home'),array('controller' =>'articles','action'=>
                         'home'));?></li>
                     <li><?php echo $this->Html->link(__('Articles'),array('controller' =>'articles','action'
                         =>'index'));?></li>
                     <li><a href="#about"><?php echo __('About');?></a></li>
                     <li><?php echo $this->Html->link(__('Contact'), array('controller' => 'contacts','action' =>'add'))?></li>   
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
      <?php echo $this->Session->flash(); ?>

      <div class="row" style="background-color: white;">
         <div class="col-sm-9 sidebar">
            <h4 class="style" style="text-align: left; background-color: #4B0082;"><?php echo __('Recent Articles')?></h4>
               <div style="margin-left: .2cm;" >
                  <?php if($articles) :?>
                     <?php foreach($articles as $article):?>
                        <?php if($article['Article']['id'] == 3):?>               
                        <h2 class="homeTitle"> <?php echo $this->Html->link($article['Article']['title'],
                            array('controller' => 'articles','action' =>'view',$article['Article']['id']));
                            ?></h2>
                        
                        <small style="color: black; font-size: 14px;"><?php echo $this->Html->tag('span',
                            $this->Text->truncate($article['Article']['body'],270));?></small>
                        <p class="conti"><?php echo $this->Html->link(__('Continue Reading...'),array('controller'=>'articles','action' =>'view',$article['Article']['id'])); ?></p>
                        <?php endif; ?>
                     <?php endforeach; ?>
                  <?php endif;?>     
               </div>&nbsp;
            <h4 class="style" style="text-align: left; background-color: #000080;"><?php echo __('Technology')  ?></h4>
               <div style="margin-left: .2cm;">
                  <?php foreach ($articles as $article): ?>
                     <?php if($article['Article']['category_id'] == 1) :?>
                   
                     <h2 class="homeTitle"> <?php echo $this->Html->link($article['Article']['title'],
                         array( 'controller' => 'articles','action' => 'view', $article['Article']['id']));
                         ?></h2>
                     <small style="color: black; font-size: 14px;"><?php echo $this->Html->tag('span',
                         $this->Text->truncate($article['Article']['body'],250));?></small>
                      <p class="conti"><?php echo $this->Html->link(__('Continue Reading...'),array('controller' =>'articles','action' =>'view',$article['Article']['id'])); ?></p>
                     <?php endif;?>
                  <?php endforeach;?>

               </div><hr>&nbsp;
         <div class="col-sm-4">&nbsp; &nbsp;
            <h4 class="style" style="background-color: green;"><?php echo __('Random') ?></h4>
               <div  style="font-size: 16px;">
                  <?php if($articles) :?>
                     <?php foreach($articles as $article):?>
                        <?php if($article['Article']['category_id'] == 3):?>           
                        <h2 class="homeTitle"><?php echo $this->Html->link($article['Article']['title'],
                          array('controller' => 'articles','action' =>'view',$article['Article']['id']));
                          ?></h2>

                        <small style="color: black; font-size: 14px;"><?php echo $this->Html->tag('span',
                          $this->Text->truncate($article['Article']['body'],200));?></small>
                        <p class="conti"><?php echo $this->Html->link(__('Continue Reading...'),array('controller' =>'articles','action' =>'view',$article['Article']['id'])); ?></p>
                        <?php endif; ?>
                     <?php endforeach; ?>
                  <?php endif;  ?>
               </div>  
         </div>
         <div class="col-sm-4">&nbsp; &nbsp;
            <h4 class="style"  style="background-color: red;"><?php echo __('Programming') ?></h4>
               <div style="font-size: 16px;">
                  <?php if($articles) :?>
                     <?php foreach($articles as $article):?>
                        <?php if($article['Article']['category_id'] == 4):?>               
                        <h2 class="homeTitle"><?php echo $this->Html->link($article['Article']['title'],
                           array('controller' => 'articles','action' =>'view',$article['Article']['id']));
                           ?></h2>

                        <small style="color: black; font-size: 14px;"><?php echo $this->Html->tag('span',
                           $this->Text->truncate($article['Article']['body'],200));?></small>
                        <p class="conti"><?php echo $this->Html->link(__('Continue Reading...'),array('controller' =>'articles','action' =>'view',$article['Article']['id'])); ?></p>
                        <?php endif; ?>
                     <?php endforeach; ?>
                  <?php endif;  ?>
               </div>  
         </div>
         <div class="col-sm-4 blog-main">
            <h4 class="style" style="color: white; background-color: #8A2BE2;"><?php echo __('Science') 
            ?></h4>
               <div style="font-size: 16px;">
                  <?php if($articles) :?>
                     <?php foreach($articles as $article):?>
                        <?php if($article['Article']['category_id'] == 2):?>               
                        <h2 class="homeTitle"><?php echo $this->Html->link($article['Article']['title'],
                           array('controller' => 'articles','action' =>'view',$article['Article']['id']));
                           ?></h2>

                        <small style="color: black; font-size: 14px;"><?php echo $this->Html->tag('span',
                           $this->Text->truncate($article['Article']['body'],200));?></small>
                        <p class="conti"><?php echo $this->Html->link(__('Continue Reading...'),array('controller' =>'articles','action' =>'view',$article['Article']['id'])); ?></p>
                        <?php endif; ?>
                     <?php endforeach; ?>
                  <?php endif;  ?>

               </div>  
         </div> 
         <div class="col-sm-12">
            <h4 class="style" style="color: white; background-color:#DC143C;" ><?php echo __('Gallery') 
            ?></h4>
               <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                     <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                     <li data-target="#myCarousel" data-slide-to="1"></li>
                  </ol>
                  <div class="carousel-inner" role="listbox" >
                     <div class="item active">
                       <?php echo $this->Html->image('ads.jpg', array('alt' => 'test', 'border' => '0')); ?>

                     </div>
                     <div class="item">
                       <?php echo $this->Html->image('ads.jpg', array('alt' => 'test', 'border' => '0'));?>

                     </div>
                  </div>
                  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                     <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                     <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                  </a>

               </div>
         </div>&nbsp;
      </div>
      <div class="col-sm-3 blog-sidebar">
            <?php echo $this->Element('side_bar_search');?>
      </div>
   </div>
   <div class="jumbotron" style="margin-top: 2cm;">
          <?php echo $this->element('footer_element');?>
   </div>
 </div>
   <div class="footer" id="footer" style="text-align:center;">
      <p><?php echo __('@2060 BlogApp.Inc'); ?></p> 
      <a href="#blogapp" class="paginate"><?php echo __('Back to Top')?></a>
   </div>
</div> &nbsp; &nbsp;