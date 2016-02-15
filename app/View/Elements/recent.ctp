            
                <h2> <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' =>'view',$article['Article']['id']));?>
                    <small class="author"> by : <?php echo $this->Html->link($article['User']['firstname'],array('controller' => 'users', 'action' => 'view', $article['User']['id']));?></small>
                </h2>
                <p style="font-size: 11px;"><?php echo $this->Time->format('F j, Y h:i A',$article['Article']['created']); ?></p>                
            </div>
            <div class="blog-post-meta" style="text-align:center;">
             <?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],250));?>
             </div>
             <p><?php echo $this->Html->link(__('Continue Reading...'),array('controller' => 'articles','action' =>'view',$article['Article']['id'])); ?></p>
        </div>
        <?php endforeach;?>
        <?php else:  ?>
              <p class="well p"><?php echo(__("No Articles Found")); ?></p>
        <?php endif;?>
 
