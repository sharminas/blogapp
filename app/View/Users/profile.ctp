<div class="container-fluid">
  <div class="row well">
      <div class="col-sm-3 col-md-3">
         <ul class="nav nav-sidebar profile">
            <li>
               <div class="row placeholders" style="margin-left: .25cm;">
                  <div class="col-xs-6 col-sm-10 placeholder">
                     <span class="glyphicon glyphicon-user" style="font-size: 100px; margin-left: 1cm; color:black;"> </span>
                     <h5 style="margin-left:.25cm; font-size: 20px;">
                      <?php echo AuthComponent::user('firstname')?>
                        <?php echo AuthComponent::user('lastname')?>
                     </h5>  
                     <div style="margin-left:.25cm; font-size: 14px;">        
                        <?php echo AuthComponent::user('email')?>
                         &nbsp;
                     </div>
                  </div>
                </div>
            </li>&nbsp; <hr>
              <h4 style="text-align:left; font-size: 18px;"><?php echo __('My Activities'); ?></h4>&nbsp;
            <li><span class="glyphicon glyphicon-user" style="font-size: 20px; color:black;">
                 &nbsp;<?php echo $this->Html->link(__('My Profile'), array('controller'=>
                 'users','action' => 'edit', AuthComponent::user('id')))?></span></li>&nbsp;
            <li><span class="glyphicon glyphicon-cog" style="font-size: 20px; color:black; 
                text-decoration:none;">&nbsp;<?php  echo $this->Html->link(__('Change Password')
                ,array('controller' =>'users','action' => 'reset')); ?></span></li>&nbsp;
            <li><span class="glyphicon glyphicon-list-alt" style="font-size: 20px; color:black;">&nbsp; 
                <?php  echo $this->Html->link(__('My Articles'),array( 'controller' => 'users','action' => 'users_article',AuthComponent::user('id'))); ?></span></li>&nbsp;
            <li><span class="glyphicon glyphicon-list" style="font-size: 20px; color:black;">
                 &nbsp;<?php  echo $this->Html->link(__('My Genre'),array( 'controller' => 
                 'users','action' => 'users_category',AuthComponent::user('id'))); ?></span></li>  &nbsp;&nbsp;&nbsp;
            <h4 style="text-align:left; font-size: 18px;"><?php echo __('Visit other Author'); ?></h4>&nbsp;
            <li><span class="glyphicon glyphicon-user" style="font-size: 20px; color:black;">
                 &nbsp;<?php echo $this->Html->link(__('View all User'), array('controller'=>
                 'users','action' => 'index'))?></span></li>&nbsp; 
            <h4 style="text-align:left; font-size: 18px;"><?php echo __('Visit other Article'); ?></h4>&nbsp;
            <li><span class="glyphicon glyphicon-edit" style="font-size: 20px; color:black;">
                 &nbsp;<?php echo $this->Html->link(__('Back to Articles'), array('controller'=>
                 'articles','action' => 'index'))?></span></li>&nbsp;      
            <li><span class="glyphicon glyphicon-home" style="font-size: 20px; color:black;">
                 &nbsp;<?php echo $this->Html->link(__('Back to Home'), array('controller'=>
                 'articles','action' => 'home'))?></span></li>&nbsp; 
          </ul>
      </div>
      <div class="col-sm-9 col-md-7">
        <h2 class="topic" style="color: black;"><?php echo __('My Articles'); ?></h2>
         <?php if (!empty($user['Article'])): ?>
            <table class="table table-striped">
              <thead>
                
                <tr>
                  <th><?php echo __('Id'); ?></th>
                  <th><?php echo __('Title'); ?></th>
                  <th><?php echo __('Status'); ?></th>
                  <th><?php echo __('Genre'); ?></th>
                  <th><?php echo __('Created'); ?></th>
                  <th><?php echo __('Modified'); ?></th>
                  <th><?php echo __('Like'); ?></th>
                  <th><?php echo __('Unlike'); ?></th>
              </tr>
            </thead>
            <tbody>
               <?php foreach ($user['Article'] as $article): ?>

               <tr>
                  <td><?php echo $article['id']; ?></td>
                  <td><?php echo $article['title']; ?></td>
                  <td><?php echo $article['status']; ?></td> 
                  <td><?php echo $article['title']; ?></td>
                  <td><?php echo $article['created']; ?></td>
                  <td><?php echo $article['modified']; ?></td> 
                  <td><?php echo $article['like_num']; ?></td>
                  <td><?php echo $article['dislike_num']; ?></td> 
              </tr>
            </tbody>
          <?php endforeach; ?>
        </table>
          <?php else: ?>
              <?php echo (__("No recent articles"));?>
          <?php endif; ?>
      <h2 style="color: black;"><?php echo __('My Category'); ?></h2>
        <?php if (!empty($user['Category'])): ?>
          <table class="table table-striped">
            <thead>
              <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Title'); ?></th>
                <th><?php echo __('Description'); ?></th>
                <th><?php echo __('Created'); ?></th>
                <th><?php echo __('Modified'); ?></th>
              </tr>
            </thead>
         <tbody>
             <?php foreach ($user['Category'] as $category): ?>
             <tr>
                <td><?php echo $category['id']; ?></td>
                <td><?php echo $category['title']; ?></td>
                <td><?php echo $category['created']; ?></td>
                <td><?php echo $category['modified']; ?></td>
             </tr>
        </tbody>
        <?php endforeach; ?>

       </table>
        <?php else: ?>
        <?php echo (__("No recent category"));?>
        <?php endif; ?>

    </div>
 </div>
</div>
<div class="jumbotron" style="background-color:white; border: none; height: 10cm;">
</div>
<div class="footer" id="footer" style="text-align:center;">
    <p> <?php __('@2060 BlogApp.Inc'); ?> </p> 
    <a href="#home" class="paginate"><?php echo __('Back to Top')?></a>
</div>
