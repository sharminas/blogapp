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
                  <li><?php echo $this->Html->link(__('Home'),array('controller' =>'articles','action'=>'home'));?></li>
                  <li><?php echo $this->Html->link(__('Articles'),array('controller' =>'articles','action'=>'index'));?></li>
                  <li><a href="#about"><?php echo __('About');?></a></li>
                  <li><?php echo $this->Html->link(__('Contact'), array('controller' => 'contacts','action' => 'add'))?></li>   
               </ul>
            </div>
            <div style="margin-right: .8cm;">
               <div class="menu"> 
                  <ul class="nav navbar-nav navbar-right">
                     <li class="dropdown holder">
                        <a class="dropdown-toggle demo" data-toggle="dropdown" role="button" aria-haspopup=
                          "true" aria-expanded="false" ><?php echo __('ENG');?>
                        
                        <span class="caret"></span></a>
                           <ul class="dropdown-menu" id="myselect">
                              <li><?php echo $this->Html->link(__('POR'),array('controller' =>'languages','action'=>'por'));?></li> 
                              <li><?php echo $this->Html->link(__('FRA'),array('controller' =>'languages','action'=>'fra'));?></li>
                              <li><?php echo $this->Html->link(__('AFR'),array('controller' =>'languages','action'=>'afr'));?></li> 
                              <li><?php echo $this->Html->link(__('ENG'),array('controller' =>'languages','action'=>'eng'));?></li>               
                           </ul> 
                     </li>          
                  </ul>
               </div>
            </div>
         </div>
      </nav>
      <div class="row">
         <div class="col-sm-9 blog-main">
            <?php if($articles):?>
               <?php foreach ($articles as $article): ?>     
               <div class="blog-post" id="content">
                  <div class="blog-actions pull-right">
                      <?php if(AuthComponent::user('id') == $article['Article']['user_id']) :?>
                       <!-- EDIT -->
                      <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-pencil" style="font-size: 18px; color:gray;"> </span>'),array(  'controller' => 'articles', 'action' => 
                         'edit',$article['Article']['id']),array('escape' => false));?>
                       <!-- DELETE -->
                      <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-trash" style=
                         "font-size: 18px; color:red;"> </span>'),array('controller' =>'articles','action' =>
                         'delete',$article['Article']['id']),array('confirm' => __('Are you sure you want to delete this article?', $article['Article']['title']),'escape' => false)); ?>
                          &nbsp;<?php endif; ?>
                  </div>
                  <div class="blog-post-title">                
                     <h2 class="topic"><?php echo $this->Html->link(__($article['Article']['title'],true),array('controller' => 'articles','action' =>'view',$article['Article']['id']));?>
                        <small class="author" title=" I'm <?php echo  $article['User']['firstname']?>, 
                           <?php echo $article['User']['about'] ?> <br> please visit and read my article" 
                           data-toggle="popover1" data-placement="right"> by :<?php echo $this->Html->link(
                           $article['User']['firstname'],array('controller' => '#', 'action' => '#', 
                           $article['User']['id']));?></small>
                     </h2>
                     <p style="font-size: 11px;"><?php echo $this->Time->format('F j, Y h:i A',$article['Article']['created']); ?>
                     </p>                
                  </div>
                  <div class="blog-post-meta" style="text-align:center; color: gray;">
                     <?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],200));?>
                  </div>
                  <p class="conti"><?php echo $this->Html->link(__('Continue Reading...'),array('controller' => 'articles','action' =>'view',$article['Article']['id'])); ?></p>
                  <hr style="border: 1px solid #DCDCDC">
               </div>
               <?php endforeach;?>
            <?php else:?>
                 <p class="p"><?php echo(__("No Articles Found")); ?></p>
            <?php endif;?>
         </div>&nbsp;&nbsp; &nbsp; 
         <div class="col-sm-3 blog-sidebar">
            <?php echo $this->Element('side_bar_search');?>
         </div>
      </div>
   </div>
      <div class="jumbotron" style="background-color: transparent; border: none; height: 3cm;"></div>
      <div class="jumbotron" style="margin-top: 2cm;">
         <?php echo $this->element('footer_element');?>
      </div>
    </div>
      <div class="footer" id="footer" style="text-align:center;">
         <p><?php echo __('@2060 BlogApp.Inc'); ?></p> 
         <a href="#blogapp" class="paginate"><?php echo __('Back to Top')?></a>
      </div>
   </div>