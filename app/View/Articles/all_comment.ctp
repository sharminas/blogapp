<?php foreach ($article['Comment'] as $comment): ?>
		<div="container"> 
		   <div class="row">
		         <div class="blog-post" id="margin">
		            <h3><?php echo $article['Article']['title']; ?></h3>
		               <?php echo $article['Article']['body']; ?>
				         <p style="color:blue;"> 
				         	<?php echo $comment['Comment']['name']; ?>
				          	<?php echo $this->Time->format('F j, Y h:i A',$comment['Comment']['created']); ?> &nbsp; says &nbsp;<?php echo $comment['Comment']['comment'];?>
				         </p>
			      </div>
		   </div>
		</div>
<?php endforeach; ?>






