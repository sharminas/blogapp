
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <ul class="navbar-nav navbar-right">
                  <li></li>
                  <li class="fb media"><?php  echo $this->Html->link(__('<span class="fa fa-facebook-official"> </span>'), 'https://github.com/sharminas/blogapp',array('escape' => false));?></li>
                  <li class="gmail media"><?php echo $this->Html->link(__('<span class="fa fa-google-plus"> </span>'), 'https://github.com/sharminas/blogapp', array('escape' => false));?></li>
                  <li class="gthub media"><?php echo $this->Html->link(__('<span class=" fa fa-github-square"> </span>'), 'https://github.com/sharminas/blogapp', array('escape' => false));?></li>
                  <li class="pin media"><?php echo $this->Html->link(__('<span class="fa fa-pinterest"> </span>'),'https://github.com/sharminas/blogapp',array('escape' => false));?> </li>
                  <li class="redit media"><?php echo $this->Html->link(__('<span class="fa fa-reddit"> </span>'),'https://github.com/sharminas/blogapp',array('escape' => false));?></li>
                  <li class="twitter media"><?php echo $this->Html->link(__('<span class="fa fa-twitter"> </span>'),"#",array('escape' => false));?></li>
            </ul>
          <h4 style="color:gray; font-style: 20px; text-align:left;">BlogApp<hr style="color: gray;"></h4>
        </div>  
        <div class="col-md-3">
           <h4 class="foot"><?php echo __('Contact Us') ?><hr style="color: gray;"></h4>
           <?php echo $this->Form->create('Contact', array('novalidate' => true)); ?>
            <?php echo $this->Form->input('name', array('class' => 'form-control', 
                 'div' => array('class' => 'form-group')));
                  echo $this->Form->input('email',array('class' => 'form-control', 
                 'div' => array('class' => 'form-group')));
                  echo $this->Form->input('message', array( 'type' => 'textbox','class' => 'form-control', 
                 'div' => array('class' => 'form-group')));
            ?>
             <button class="btn btn-sm btn-primary btn-block" type="submit"> <?php echo __('Send'); ?> </button> 
        </div>  
        <div class="col-md-6">
          <div class="archive-module">
            <h4 id="about" class="foot"><?php echo __('About the Blog') ?><hr style="color: gray;"></h4>
              <ul class="list-unstyled">
                <li>
                  <p style="text-align:justify; font-size: 12px;"> <?php echo __('A blog (a truncation of the expression weblog)[1] is a discussion or informational site published on the World Wide Web consisting of discrete entries ("posts") typically displayed in reverse chronological order (the most recent post appears first. <br/>
                   The emergence and growth of blogs in the late 1990s coincided with the advent of web publishing tools that facilitated the posting of content by non-technical users.(Previously, a knowledge of such technologies as HTML and FTP had been required to publish content on the Web.)
                   A majority are interactive, allowing visitors to leave comments and even message each other via GUI widgets on the blogs, and it is this interactivity that distinguishes them from other static websites. In that sense, blogging can be seen as a form of social networking service. Indeed, bloggers do not only produce content to post on their blogs, but also build social relations with their readers and other bloggers. However, there are high-readership blogs which do not allow comments, such as Daring Fireball.).')?></p>
                </li>  
              </ul>
          </div>
        </div>  
        <div class="col-md-3">
          <h4 class="foot"><?php echo __('Random Articles') ?> <hr style="color: gray;"></h4>
          <?php if($articles) :?>
            <?php foreach($articles as $article):?>
              <?php if($article['Article']['category_id'] == 3) :?>               
                <p class="footer"><?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' =>'view',$article['Article']['id']));?></p>
                <small><?php echo $this->Time->format('F j, Y h:i A',$article['Article']['created']); ?></small>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif;  ?>
        </div>
      </div>
    </div>
  </div>    
