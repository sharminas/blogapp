
   <div class="container">
      <div class="row">
         <div class="col-sm-9 blog-main" style="background-color:white;">
            <h4 class="style"style="text-align: left; color: black;"><?php echo __('Recent Articles') ?><hr></h4>
                  <div class="sideli" style="font-size: 16px;" >
                    <?php if($articles) :?>
                      <?php foreach($articles as $article):?>
                        <?php if($article['Article']['id'] == 3):?>               
                        <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' =>'view',$article['Article']['id']));?>
                        <small style="color: gray; font-size: 14px;"><?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],350));?></small>
                         <p class="conti"><?php echo $this->Html->link(__('Continue Reading...'),array('controller' =>'articles','action' =>'view',$article['Article']['id'])); ?></p>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    <?php endif;  ?>
               </div>&nbsp;
            <h4 class="style" style="text-align: left; color: black;"><?php echo __('Popular Articles') ?><hr></h4>
               <div class="sideli">
                  <ul class= "list-unstyled header">
                     <?php foreach ($articles as $article): ?>
                        <?php if($article['Article']['like_num'] >= 1) :?>
                        <li style="font-size:12px; color: gray;">
                           <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' => 'view', $article['Article']['id']));?> &nbsp;
                           <p style="color:black;"><?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],350));?></p>
                           <p class="conti"><?php echo $this->Html->link(__('Continue Reading...'),array('controller' =>'articles','action' =>'view',$article['Article']['id'])); ?></p>
                        </li>
                        <?php endif;?>
                     <?php endforeach;?>
                  </ul>
               </div><hr>&nbsp; &nbsp;
               <div class="col-sm-4 blog-main">&nbsp; &nbsp;
                  <h4 class="style" style="color: black;"><?php echo __('Random') ?><hr></h4>
                     <div class="sideli" style="font-size: 16px;">
                           <?php if($articles) :?>
                              <?php foreach($articles as $article):?>
                                 <?php if($article['Article']['category_id'] == 3):?>               
                                 <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' =>'view',$article['Article']['id']));?>
                                 <small style="color: gray; font-size: 14px;"><?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],200));?></small>
                                  <p class="conti"><?php echo $this->Html->link(__('Continue Reading...'),array('controller' =>'articles','action' =>'view',$article['Article']['id'])); ?></p>
                                 <?php endif; ?>
                               <?php endforeach; ?>
                             <?php endif;  ?>
                     </div>  
               </div>
               <div class="col-sm-4 blog-main">&nbsp; &nbsp;
                  <h4 class="style" style="color: black;"><?php echo __('Programming') ?><hr></h4>
                     <div class="sideli" style="font-size: 16px;">
                          <?php if($articles) :?>
                            <?php foreach($articles as $article):?>
                              <?php if($article['Article']['category_id'] == 4):?>               
                              <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' =>'view',$article['Article']['id']));?>
                              <small style="color: gray; font-size: 14px;"><?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],200));?></small>
                               <p class="conti"><?php echo $this->Html->link(__('Continue Reading...'),array('controller' =>'articles','action' =>'view',$article['Article']['id'])); ?></p>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif;  ?>
                     </div>  
               </div>
               <div class="col-sm-4 blog-main">
                  <h4 class="style" style="color: black;"><?php echo __('Science') ?><hr></h4>
                     <div class="sideli" style="font-size: 16px;">
                        <?php if($articles) :?>
                           <?php foreach($articles as $article):?>
                              <?php if($article['Article']['category_id'] == 2):?>               
                              <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' =>'view',$article['Article']['id']));?>
                              <small style="color: gray; font-size: 14px;"><?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],200));?></small>
                               <p class="conti"><?php echo $this->Html->link(__('Continue Reading...'),array('controller' =>'articles','action' =>'view',$article['Article']['id'])); ?></p>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif;  ?>
                     </div>  
               </div> &nbsp;
               <div class="col-sm-12 blog-main">
                   <h4 class="style" style="color: black;"><?php echo __('Gallery') ?><hr></h4>
                      <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox" >
                          <div class="item active">
                                <?php echo $this->Html->image('http://localhost/blogapp/app/webroot/img/ads.jpg', array('alt' => 'test', 'border' => '0')); ?>
                          </div>
                          <div class="item">
                               <?php echo $this->Html->image('http://localhost/blogapp/app/webroot/img/ads.jpg', array('alt' => 'test', 'border' => '0')); ?>
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
              </div>
            </div>
            <div class="col-sm-3 blog-sidebar">
                   <?php echo $this->Element('side_bar_search');?>
            </div>
         </div>
      </div>
   <div class="jumbotron" style="background-color:white; border: none; height: 3cm;"></div>
   <div class="jumbotron" style="background-color:black; border: none;">
         <?php echo $this->element('footer_element');?>
   </div>
   <div class="footer" id="footer" style="text-align:center;">
      <p><?php echo __('@2060 BlogApp.Inc'); ?></p> 
      <a href="#home" class="paginate"><?php echo __('Back to Top')?></a>
   </div>
     