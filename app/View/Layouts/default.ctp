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
      <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=PT+Sans+Caption" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		  <?php echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		  ?>		    
</head>	
  <body>
    <div class="loader"> </div> 
    <div class="col-sm-12">
      <div class="col-sm-offset-1 col-sm-6" >
       <h2 id="blogapp" class="cp"><?php echo __('BLOGAPP'); ?></h2>
          <p class="blogpar"><?php echo __('A blog (a truncation of the expression weblog a discussion or informational site published on the World Wide Web.'); ?> 
          </p>
      </div>
    </div>
    <div class="jumbotron blogtop" style="background-color:transparent; border:none;"></div>&nbsp;
          <?php echo $this->fetch('content'); ?>

<!--JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <?php echo $this->Html->script('bootstrap.min'); ?>
   <!--  <?php //echo $this->Html->script('tiny_mce/tiny_mce'); ?> -->
    <?php echo $this->Html->script('tinymce/tinymce.min.js'); ?>
   <!--  <?php //echo $this->Html->script('tiny_mce/jbimages/editor_plugin'); ?> -->
    <script type="text/javascript">
    tinymce.init ({
         mode: 'textareas',
         skin: 'lightgray',
         editor_selector: 'textEditor',
         toolbar: ' bullist numlist outdent indent forecolor backcolor',
         plugins: 'code autosave colorpicker textcolor fullpage fullscreen searchreplace wordcount image imagetools insertdatetime layer link table media template',
         relative_urls : false, 
         remove_script_host : true, 
         convert_urls : true, 
      });
    </script>
  <!-- like and unlike -->
    <script type= "text/javascript">
      <?php if(AuthComponent::user('id')):?>
         $(document).ready(function() {
              $('#AddButton').one("click", function() {
                 var counter = $('#like').val();
                 var newcounter = +counter + 1 ;  
                 $('#like').val(newcounter);
               });
           });
         $(document).ready(function() {
            $('#AddButton').one("dblclick", function() {
                 var counter = $('#like').val();
                 var newcounter = counter - 1 ;
                $('#like').val(newcounter);
              });
           });
         $(document).ready(function() {
              $('#AddButton_dis').one("click", function() {
                 var counter = $('#dislike').val();
                 var newcounter = +counter + 1 ;  
                 $('#dislike').val(newcounter);
              });
           });
          $(document).ready(function() {
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
    <script type="text/javascript">
      $(document).ready(function() {
          $("[data-toggle=popover]").popover( {
               placement : 'bottom',
               trigger : 'focus',
               html : true,
               content :'<?php echo $this->Html->link(__('Sign In',true),array('controller' => 'users','action' => 'login'));?>'
          });
      });
      $(document).ready(function() {
          $("[data-toggle=popover1]").popover({
               placement : 'right',
               trigger : 'focus',
               html : true,
               content :'<?php echo $this->Html->link(__('Sign In',true),array('controller' => 'users', 
                   'action' => 'login'));?>'
           });
      });
    </script>
    <?php endif; ?>
  <!-- for hover -->
    <script type="text/javascript">
      $(document).ready(function() {
          $('.message').hover(function() {
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
    <script type="text/javascript">
        $(function() {
            $(".dropdown-menu li").click(function() {
                // $("#myselect").text($(this).text());
                // $(".demo").val($(this).text());
                var lang = $("#myselect").text($(this).text());
                $(".demo").submit(function(e) {
                     $('.demo').val(lang);
                    e.preventDefault();
                });
            });
        });
    </script>
  <!-- loading -->
    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut(1500);
        });
    </script>
  <!-- for search hide and show -->
    <script type="text/javascript">  
      $(document).ready(function() {
        $('#hide').click(function() {
            if( $(".contact").is(":hidden") ) {
                $(".contact").show();
             }else {
                $(".contact").hide();
             }
        });
      });
    </script>
  <!-- action search -->
  <!-- search -->
</body>
</html> 
