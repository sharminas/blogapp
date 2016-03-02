
<?php if($articles): ?>
	<?php foreach ($articles as $article): ?>
		<p style="color:black; text-align: justify;">
			<?php echo $article['Comment']['name']; ?>
			&nbsp;<?php echo $this->Time->format('F j, Y ',$article['Comment']['created']); ?> 
			&nbsp;&nbsp; says &nbsp; <?php echo ($article['Comment']['comment']); ?></p>
	<?php endforeach;?>
<?php endif; ?>
	 