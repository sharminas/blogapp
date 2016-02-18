<?php if($article['Article']['id'] == $article['Comment']['article_id']) :?>  
  <p style="color:black;"> 
      <?php echo $article['Comment']['name']; ?>
      <?php echo $this->Time->format('F j, Y h:i A',$article['Comment']
      ['created']); ?> 
      &nbsp;  <p> <?php __('says'); ?> </p>  &nbsp;
      <?php echo ($article['Comment']['comment']); ?>
  </p>
<?php else: ?>
	<?php echo __('No Comments');?>
<?php  endif ; ?>