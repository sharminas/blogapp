<div class="container">
    <h1><?php echo __('User'); ?></h1>      
    <div class="row">
             <div class="col-md-12">
              <table class="table">
              <thead>
              <tr>
		            <th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('email'); ?></th>
					<th><?php echo $this->Paginator->sort('firstname'); ?></th>
					<th><?php echo $this->Paginator->sort('lastname'); ?></th>
					<th><?php echo $this->Paginator->sort('address'); ?></th>
					<th><?php echo $this->Paginator->sort('gender'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th><?php echo $this->Paginator->sort('modified'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
			<?php foreach ($users as $user): ?>
			<tr>
							<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
							<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
							<td><?php echo h($user['User']['firstname']); ?>&nbsp;</td>
							<td><?php echo h($user['User']['lastname']); ?>&nbsp;</td>
							<td><?php echo h($user['User']['address']); ?>&nbsp;</td>
							<td><?php echo h($user['User']['gender']); ?>&nbsp;</td>
							<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
							<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
							<td class="actions">
								<?php echo $this->Html->link(__('Add'), array('action' => 'add', ));?>
								<?php echo $this->Html->link(__('View'), array('action' => 'view', 
								 $user['User']['id'])); ?>
								<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', 
								 $user['User']['id'])); ?>
								<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', 
								 $user['User']['id']), array('confirm' => __('Are you sure you want to delete id number %s?',
								 $user['User']['id']))); ?>
							</td>
		    </tr>
           <?php endforeach; ?>
            </tbody>
            </table>
	          	 <p>
				<?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));?></p> 
			    <div class="paging">
				<?php echo $this->Paginator->prev('< ' . __('previous'), array(), null,  array('class' => 'prev'));
					  echo $this->Paginator->numbers(array('separator' => '')); 
					  echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next'));?>
	            </div>
        
 		    </div>
 	 </div>
</div>

