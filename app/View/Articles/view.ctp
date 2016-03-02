   <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:white; border:none;">
      <div class="head">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#userNavbar" aria-expanded="false" aria-controls="userNavbar" style="background-color: white; border:none;">
              <span class="sr-only">Toggle navigation</span>
              <span  style="background-color: black;" class="icon-bar"></span>
              <span  style="background-color: black;" class="icon-bar"></span>
              <span  style="background-color: black;" class="icon-bar"></span>
            </button>          
         </div>
         <div id="userNavbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav" style="margin-left: 2cm; background-color:white;">
               <?php if(AuthComponent::user('id')): ?>
                  <li class="dropdown"></li>
                     <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo AuthComponent::user('firstname')?><span class="caret"></span></a>
                        <ul class="dropdown-menu" style="background-color:white;">
                           <li><?php echo $this->Html->link(__('Add Article'), array('controller'=>'articles'
                               ,'action' => 'add'))?></li>
                           <li><?php echo $this->Html->link(__('Profile'), array('controller'=>'users','action' => 'profile', AuthComponent::user('id')))?></li>
                           <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users','action' => 'logout'),array('confirm' => __('Are you sure you want to logout?'),
                              'escape' => false));?> </li> 
             
                        </ul>
                  </li> 
               <?php else: ?>
                
                  <li><?php echo $this->Html->link(__('Sign in',true),array('controller' => 'users', 'action' => 'login'));?></li>
                  <li><?php echo $this->Html->link(__('Sign up',true),array('controller' => 'users', 'action' => 'add'));?></li>
               <?php endif; ?> 
            </ul>
            <div style="margin-top: .3cm; margin-right: 1cm;" class="pull-right" id="search">
               <form name="search" id="demo2" method="post"  action="search">
                  <input type="text" name="find" class="Txtbox1" placeholder="<?php echo (__('Search...'));
                     ?>"/>
                     <button class= "glyphicon glyphicon-search" style= "font-size: 20px;color: #696969; background-color: transparent; border:none;" id='hide'> 
                     </button>
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
                  <ul class="nav navbar-nav" style="margin-left: -.7cm;">
                     <li><?php echo $this->Html->link(__('Home'),array('controller' =>'articles','action'=>
                       'home'));?></li>
                     <li><?php echo $this->Html->link(__('Articles'),array('controller' =>'articles','action'
                       =>'index'));?></li>
                     <li><a href="#about"><?php echo __('About');?></a></li>
                     <li><?php echo $this->Html->link(__('Contact'), array('controller' => 'contacts',
                        'action' => 'add'))?></li>   
                  </ul>
               </div>
               <div style="margin-right: .8cm;">
                  <div class="menu"> 
                     <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown holder"> 
                           <a class="dropdown-toggle demo" data-toggle="dropdown" role="button" aria-haspopup
                             ="true" aria-expanded="false" ><?php echo __('ENG');?>
                           
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
         <div class="col-sm-9">
            <div class="blog-post" id="content">
               <div class="blog-actions pull-right">
                  <?php if(AuthComponent::user('id') == $article['Article']['user_id']) :?>
                 <!-- EDIT -->
                 <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-pencil" style="font-size: 18px; color:black;"> </span>'),array('controller' => 'articles', 'action' => 'edit',
                    $article['Article']['id']),array('escape' => false));?>
                 <!-- DELETE -->
                 <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-trash" style="font-size: 18px; color:red;"> </span>'),array('controller' =>'articles','action' =>'delete',
                    $article['Article']['id']),array('confirm' => __('Are you sure you want to delete this article?', $article['Article']['title']),'escape' => false)); ?> 
                  &nbsp;
                 <?php endif; ?>

               </div>
               <div class="blog-post-title">                
                  <h2 class="topic"><?php echo $this->Html->link($article['Article']['title'],array('controller' =>'articles','action' =>'view',$article['Article']['id']));?><small 
                     class="author">by : <?php echo $this->Html->link($article['User']['firstname'],array(
                     'controller' =>'users', 'action' => 'view', $article['User']['id']));?></small>
                  </h2>

                  <p style="font-size: 11px;"><span class="glyphicon glyphicon-time">&nbsp;<?php echo __('Posted: ');?><?php echo $this->Time->format('F j, Y',$article['Article']['created']); ?>
                     </span></p>      
               </div>  
                  <p style="text-align:center; color: gray;"><?php echo $article['Article']['body'] ?></p>
         </div>
         <div><br>
            <div class="sidebar">
               <h4 class="style" style="background-color:black;"><?php  echo __('Archives') ?> </h4>
            </div>
               <ul class="list-unstyled side topic">
                  <?php if($articles): ?>
                    <?php if($article['Category']['id'] && $article['Article']['category_id'] == 1):?>
                      <?php foreach ($articles as $article): ?>
                        <?php if($article['Category']['id'] && $article['Article']['category_id'] == 1):?>
                          <li style="font-size:14px; color: gray;">
                            <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' => 'view', $article['Article']['id']));?> &nbsp;
                            <?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],150));?>
                          </li>
                        <?php endif; ?>
                      <?php endforeach;?>
                    <?php elseif($article['Category']['id'] && $article['Article']['category_id'] == 2):?>
                      <?php foreach ($articles as $article): ?>
                        <?php if($article['Category']['id'] && $article['Article']['category_id'] == 2):?>

                          <li style="font-size:14px; color: gray;">
                                <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' => 'view', $article['Article']['id']));?> &nbsp;
                                <?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],150));?>
                              </li>
                        <?php endif; ?>
                      <?php endforeach;?>
                    <?php elseif($article['Category']['id'] && $article['Article']['category_id'] == 3):?>
                      <?php foreach ($articles as $article): ?>
                        <?php if($article['Category']['id'] && $article['Article']['category_id'] == 3):?>

                            <li style="font-size:14px; color: gray;">
                                  <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' => 'view', $article['Article']['id']));?> &nbsp;
                                  <?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],150));?>
                            </li>
                        <?php endif; ?>
                      <?php endforeach;?>
                    <?php else:?>
                        <?php echo __('No related Article');?>
                    <?php endif;?>
                  <?php endif; ?>

               </ul> <br> 
            <h5 class="topic">
               <?php echo $this->Html->link(__('Add Comment'),array('controller'=>'comments','action'=>
                  'add',$article['Article']['id']));?>

               <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-comment" style="font-size:22px; color:black;"></span>'),array('controller' =>  'comments', 'action' =>'add',$article['Article']['id']),array('escape' => false)); ?> 
                 <!-- database -->
                 <!--   <?php //"remind me to test this"?> -->
               <a title="<?php echo (__('To like this article, please login')); ?>" data-toggle="popover" 
                  data-placement="bottom"> 
                   <button class= "glyphicon glyphicon-thumbs-up message" title="<?php echo (__('I like this article')); ?>" style="font-size: 22px; color: black; background-color: white;          border:none;" id='AddButton' value="+"> </button></a>
                   <input type="text" name="like" id="like" style="background-color: white; width: 15px; border: none;" value="<?php echo $article['Article']['like_num']; ?>" readonly/>
                    <!-- dislike -->
               <a title="<?php echo (__('To unlike this article, please login')); ?>" data-toggle="popover" 
                   data-placement="bottom">
                   <button class= "glyphicon glyphicon-thumbs-down message"  title="<?php echo (__('I dont like this article')); ?>"   style="font-size: 22px; color: red; background-color: white; border: none;" 
                      id='AddButton_dis' value="+"></button></a>
                   <input type="text" name="dislike" id="dislike" style="background-color: white; width: 15px; border: none;" value="<?php echo $article['Article']['dislike_num']; ?>" readonly/>
                   <!-- view -->
                   <button class= "glyphicon glyphicon-eye-open" style="font-size: 22px; color: gray;background-color: white; border: none;" id='AddButton_dis' value="+" disabled></button>
                   <input type="text" name="dislike" id="dislike" style="background-color: white; color: gray; width: 22px; border: none;" value="<?php echo $article['Article']['id']; ?>" 
                   readonly/>
            </h5>
            <div class="well col-sm-9">
             <?php echo $this->Element('add_comment');?>
             
            </div>
            <?php echo $this->Form->create('Comment',array('novalidate' => true,'controller' => 'comments',
             'action' => 'add')); ?>
            <?php if(AuthComponent::user('id')) :?>
               <div class="col-sm-9">
                  <?php echo $this->Form->input('name',array('class' => 'form-control','div' => array(
                       'class' => 'form-group')));
                        echo $this->Form->input('email', array('class' => 'form-control','div' => 
                           array('class' => 'form-group')));
                        echo $this->Form->input('comment', array('type' => 'textarea','rows' => '5', 
                          'cols' => '40','class' => 'form-control','div' => array('class' => 'form-group')));?>
               <div class="col-sm-3 pull-right">
                  <button class="btn btn-sm btn-primary btn-block" type="submit"><?php echo __('Post my Comment'); ?> 
                  </button> 
                  <?php $this->Form->end();?>
               </div>
            </div>&nbsp;
            <?php endif;?>
         </div> 
      </div>
      <div class="col-sm-3 side">
           <?php echo $this->Element('side_bar');?>
      </div>
   </div>
   <div class="jumbotron" style="background-color: transparent; border: none; height: 3cm;"></div>
   <div class="jumbotron">
     <?php echo $this->element('footer_element');?>
   </div>
 </div>
   <div class="footer" id="footer" style="text-align:center;">
     <p><?php echo __('@2060 BlogApp.Inc'); ?></p> 
     <a href="#blogapp" class="paginate"><?php echo __('Back to Top')?></a>
   </div>