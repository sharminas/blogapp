

<div="container">
    <div class="row">
              <div class="blog-post" id="margin">
		          <p> <?php echo $comment['Comment']['name']; ?>
		          	<?php echo $this->Time->format('F j, Y h:i A',$comment['Comment']['created']); ?> &nbsp;<?php echo __('says'); ?>&nbsp; 
                     <?php echo ($comment['Comment']['comment']); ?>
                    </p>
	         </div>
      </div>
</div>






