<!DOCTYPE html>
<html>
<head>
  <title>
      BlogApp
	</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    	<?php echo $this->Html->css(array('bootstrap.min','style')) ?>
      <link rel="stylesheet" href="animate.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		  <?php echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		  ?>		    
</head>	
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: black; border:none;">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"  aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>          
      </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div class="head"> 
            <ul class="nav navbar-nav ">
              <li class="dropdown">
              <?php if(AuthComponent::user('id')): ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo AuthComponent::user('firstname')?><span class="caret"></span></a>
                  <ul class="dropdown-menu" style= "background-color: white; border:none;">
                    <li><?php echo $this->Html->link(__('Add Article'),array('controller' =>'articles','action'=>'add')); ?></li>
                    <li><?php echo $this->Html->link(__('Add Category'),array('controller' => 'categories', 'action' =>'add')); ?></li>
                    <li><?php echo $this->Html->link(__('Profile'), array('controller'=>'users','action' => 'profile', AuthComponent::user('id')))?>
                    </li>
                    <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users','action' => 'logout'),array('confirm' => __('Are you sure you want to logout?'),'escape' => false));?>
                    </li>   
                  </ul>
            <?php else: ?>
            <li><?php echo $this->Html->link(__('Sign in',true),array('controller' => 'users', 'action' => 'login'));?></li>
            <li><?php echo $this->Html->link(__('Sign up',true),array('controller' => 'users', 'action' => 'add'));?></li>
              <?php endif; ?>          
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <div style="margin-top: .3cm;">
                  <input type="text" name="search" id="search" class="text" value=""/>
                  <button class= "glyphicon glyphicon-search" style= "font-size: 22px;color: #696969; background-color: transparent; border:none;" id='hide' value="+"> </button>
              </div>
            </li>
            <li><?php echo $this->Html->link(__('Home'),array('controller' =>'articles','action'=>'home'));?></li>
            <li><?php echo $this->Html->link(__('Articles'),array('controller' =>'articles','action'=>'index'));?></li>
            <li><a href="#about"><?php echo __('About');?></a></li>
            <li><?php echo $this->Html->link(__('Contact'), array('controller' => 'contacts','action' => 'add'))?></li>
            <li>
                <a class="dropdown-toggle demo" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >ENG <span class="caret"></span></a>
                    <ul class="dropdown-menu" id="myselect">
                        <li><a href="#">FRA </a></li>
                        <li><a href="#">POR</a></li> 
                        <li><a href="#">ENG</a></li>               
                    </ul> 
            </li>          
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    </ol>
      <div class="carousel-inner" role="listbox" style="height: 8cm;">
        <div class="item active">
          <?php echo $this->Html->image('http://localhost/blogapp/app/webroot/img/i.png', array('alt' => 'test', 'border' => '0')); ?>
          <div class="container">
            <div class="carousel-caption">
              <h2 id="home" class="title"><?php echo __('BLOGAPP'); ?></h2>
                <p style="font-size: 10px; color: black; text-align:center;"><?php echo __('A blog (a truncation of the expression weblog a discussion or informational site published on the World Wide Web.'); ?> </p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" style="color: transparent;" aria-hidden="true"></span>
        <span class="sr-only"><?php __('Previous'); ?></span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" style="color: transparent;" aria-hidden="true"></span>
        <span class="sr-only"><?php __('Next'); ?></span>
      </a>
  </div>
  <div class="jumbotron blogtop" style="background-color:white;border:none;">
        <div class="margin-top: .3cm;">
        </div>
    </div>
  
          <?php echo $this->Session->flash(); ?>
          <?php echo $this->fetch('content'); ?>
<!--JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->Html->script('tiny_mce/tiny_mce'); ?>
    <?php echo $this->Html->script('tiny_mce/jbimages/editor_plugin'); ?>
    <script type="text/javascript">
    	 tinyMCE.init({
    		 mode:"textareas",
    		 theme:"advanced",
    		 theme_advanced_buttons1:"forecolor,backcolor,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,|,cut,copy,undo,redo,paste,pasteword,search,replace,|,link,unlink,|,jbimages,image,emotions,code,cleanup,anchor",
    		 theme_advanced_buttons2:"formatselect,styleselect,fontselect,fontsizeselect,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,|,outdent,indent,blockquote,|,document",
    		 theme_advanced_buttons3:"preview,insertdatetime",
    		 theme_advanced_toolbar_location:"top",
    		 theme_advanced_toolbar_align:"left",
    		 theme_advanced_path_location:"bottom",
    		 extended_valid_elements:"a[name|href|target|title|onclick,img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
         plugins: "jbimages,preview,emotions,insertdatetime",
         language: "en",
      	 relative_urls:false,
    	 });
    </script>
    <!-- like and unlike -->
    <script type= "text/javascript">
      <?php if(AuthComponent::user('id')):?>
         $(document).ready(function(){
              $('#AddButton').one("click", function() {
                 var counter = $('#like').val();
                 var newcounter = +counter + 1 ;  
                 $('#like').val(newcounter);
              });
           });
         $(document).ready(function(){
            $('#AddButton').one("dblclick", function() {
                 var counter = $('#like').val();
                 var newcounter = counter - 1 ;
                $('#like').val(newcounter);
              });
           });
         $(document).ready(function(){
              $('#AddButton_dis').one("click", function() {
                 var counter = $('#dislike').val();
                 var newcounter = +counter + 1 ;  
                 $('#dislike').val(newcounter);
              });
           });
          $(document).ready(function(){
            $('#AddButton_dis').one("dblclick", function() {
                 var counter = $('#dislike').val();
                 var newcounter = counter - 1 ;
                $('#dislike').val(newcounter);
              });
           });
      <?php endif;?>
    </script>
    <!-- popover on like and unlike -->
    <?php if(!(AuthComponent::user('id') ) ):?>
    <script>
      $(document).ready(function(){
        $("[data-toggle=popover]").popover({
             placement : 'bottom',
             trigger : 'focus',
             html : true,
             content :'<?php echo $this->Html->link('Sign in',array('controller' => 'users', 
                 'action' => 'login'));?>'
         });
       });
       $(document).ready(function(){
        $("[data-toggle=popover1]").popover({
             placement : 'right',
             trigger : 'focus',
             html : true,
             content :'<?php echo $this->Html->link('Sign in',array('controller' => 'users', 
                 'action' => 'login'));?>'
         });
       });
     </script>
     <?php endif; ?>
     <!-- for hover -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('.message').hover(function(){
          var title = $(this).attr('title');
             $(this).data('tipText',title).removeAttr('title');
                $('<p class="toolcss"></p>')
                .text(title)
                .appendTo('body')
                .fadeIn();
          },function() {
                $(this).attr('title',$(this).data('tipText'));
                $('.toolcss').remove();
          })mousemove(function(e) {
                var mousex = e.pageX + -15; //Get X coordinates
                var mousey = e.pageY + 13; //Get Y coordinates
                $('.toolcss')
                .css({ top: mousey, left: mousex })
        });
      });
    </script>
    <!-- flash message -->
    <script type="text/javascript">
    $(document).ready(function() {
        $("#hide").click(function() {
            $("#exit").hide();
        });
    });
    </script>
  <!-- changing language -->
    <script>
       $(function() {
          $(".dropdown-menu li").click(function() {
              $(".demo").text($(this).text());
              $(".demo").val($(this).text());
          });
      });
    </script>
  <!-- for search hide and show -->
    <script type="text/javascript">  
      $(document).ready(function() {
        $('#hide').click(function() {
          if( $("#search").is(":hidden") ) {
              $("#search").show();
           } else {
              $("#search").hide();
           }
        });
    });
    </script>
  <!-- action search -->
   <script language="JavaScript" type="text/javascript">
    $('#hide').one("click", function() {
                  var tb1 = document.getElementById('txtInput');
                  var tb2 = document.getElementById('txtSearch');
                 $('#txtSearch').val(tb1);
        });
  </script>
  </body>
</html> 