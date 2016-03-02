	<?php if($article['Article']['id'] == $article['Comment']['article_id']) :?>  
		<h4><?php 'Comment' ?></h4>
			<p style="color:black;"> 
				<?php echo $article['Comment']['name']; ?>
				<?php echo $this->Time->format('F j, Y h:i A',$article['Comment']['created']); ?> 
			   <p><?php __('says'); ?>  <?php echo ($article['Comment']['comment']); ?> </p>
			</p>
	<?php else: ?>
		<?php echo __('No Comments');?>
	<?php  endif ; ?>
