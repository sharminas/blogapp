
   <div class="container">
      <div class="row">
         <div class="col-sm-9 blog-main">
            <h3> <?php echo __('Search Result:');?> </h3>
            <p class="search"> </p>
         </div>
         <div class="col-sm-3 blog-sidebar adjust">
           <?php echo $this->Element('search_sidebar');?>
         </div>
      </div>
    </div>
   <div class="jumbotron" style="background-color:black; border: none;">
          <?php echo $this->element('footer_element_2');?>
   </div>
   <div class="footer" id="footer" style="text-align:center;">
         <p> <?php __('@2060 BlogApp.Inc'); ?> </p> 
        <a href="#home" class="paginate"><?php echo __('Back to Top')?></a>
   </div>
     