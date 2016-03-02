
  <div class="container">
       <nav class="navbar navbar-inverse" style="background-color: black; border:none;">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" style="border:none;"  aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="glyphicon glyphicon-home" style="font-size: 23px; color: white; border:none;"></span>
            </button>       
          </div>
            <div id="navbar" class="navbar-collapse collapse">
              <div class="menu"> 
                <ul class="nav navbar-nav" style="margin-left: -.7cm;">
                    <li><?php echo $this->Html->link(__('Home'),array('controller' =>'articles','action'=>'home'));?></li>
                    <li><?php echo $this->Html->link(__('Articles'),array('controller' =>'articles','action'=>'index'));?></li>
                    <li><a href="#about"><?php echo __('About');?></a></li>
                    <li><?php echo $this->Html->link(__('Contact'), array('controller' => 'contacts','action' => 'add'))?></li>   
                </ul>
              </div>
            <div style="margin-right: .8cm;">
              <div class="menu"> 
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown holder"> </li>
                    <li class="dropup">
                      <a class="dropdown-toggle demo" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><?php echo __('ENG');?>
                        
                        <span class="caret"></span></a>
                          <ul class="dropdown-menu" id="myselect">
                            <li tabindex="-1" ><?php echo $this->Html->link(__('POR'),array('controller' =>'languages','action'=>'por'));?></li> 
                            <li tabindex="-1" ><?php echo $this->Html->link(__('FRA'),array('controller' =>'languages','action'=>'fra'));?></li>
                            <li tabindex="-1" ><?php echo $this->Html->link(__('AFR'),array('controller' =>'languages','action'=>'afr'));?></li> 
                            <li tabindex="-1" ><?php echo $this->Html->link(__('ENG'),array('controller' =>'languages','action'=>'eng'));?></li>               
                          </ul> 
                    </li>          
                </ul>
              </div>
            </div>
          </div>
    </nav>
    <div class="row">
        <div class="col-sm-9 blog-main">
            <div class="col-sm-12 well">
              <?php 
                  $find = $_POST['find']; 
                  mysql_connect("localhost","root","") or die(mysql_error());
                  mysql_select_db("blogapp_db") or die(mysql_error());

                      $find = strtoupper($find);
                      $find = strip_tags($find);
                      $find = trim ($find);                      
                      $data = mysql_query("SELECT * FROM users WHERE upper(firstname) LIKE'%$find%'");
                      $anymatches=mysql_num_rows($data);
                          if ($find == "")  {
                               echo (__("<p style='font-size: 24px; font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;'>You forgot to enter a search term!!!</p>"));
                          }
                          if ($anymatches == 0) {
                               echo (__("<p style='font-size: 22px; font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;'>Sorry, but we can not find the title of that Article.</p><br><br>"));
                          } ?>

              <h3><?php  echo __("Search For: ") . $find . "<br>"; ?> </h3>
                
                    <?php  while($result = mysql_fetch_array( $data )) { ?>
                      <h3 class="topic" style="font-size: 18px;"><?php  echo $this->Html->link(__($result['firstname']),array( 
                          'controller' => 'articles','action' => 'view',$result['id'])); ?>
                      </h3>
                        <?php } ?>
            </div>
        </div>
        <div class="col-sm-3 blog-sidebar">
           <?php echo $this->Element('user_searchbar');?>
        </div>
       <div class="jumbotron">
          <?php echo $this->element('user_footer');?>
    </div>
    <div class="footer" id="footer" style="text-align:center;">
          <p> <?php echo __('@2060 BlogApp.Inc'); ?> </p> 
          <a href="#blogapp" class="paginate"><?php echo __('Back to Top')?></a>
    </div> 
    </div> 
  </div>
 