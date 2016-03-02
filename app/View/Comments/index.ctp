<div="container"> 
   <div class="row">
		<div class="blog-post" id="margin">
		  <?php foreach($comments as $comment): ?>
				<p style="color:black;"> 
				  <?php echo $comment['Comment']['name']; ?>
				  <?php echo $this->Time->format('F j, Y h:i A',$comment['Comment']['created']); ?> 
			   </p>
				<small> &nbsp; <?php echo __('says'); ?> &nbsp;<?php echo $comment['Comment']['comment'];?></small>
		  <?php endforeach; ?>
		</div>
  </div>
</div>