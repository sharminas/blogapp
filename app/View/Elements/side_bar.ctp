      
      <div class="side">
        <div class="sidebar">
            <h4 class="style" id="hide1"><?php  echo __('Archives') ?> </h4>
              <ul class="list-unstyled header"  id="hidden">
                <li><?php echo $this->Html->link(__('March 2016'),array('controller' => 'articles',
                           'action' =>'index_filter','?' => array('month'=>3))); ?></li>
                <li><?php echo $this->Html->link(__('February 2016'),array(
                           'controller' => 'articles', 'action' =>'index_filter', '?' => array('month' => 2)));?></li>
                <li><?php echo $this->Html->link(__('January 2016'),array(
                           'controller' => 'articles', 'action' =>'index_filter','?' => array('month' => 1))); ?></li>
                <li><?php echo $this->Html->link(__('December 2016'),array('controller' => 'articles', 
                           'action' =>'index_filter','?' =>array('month' => 12))); ?></li>
              </ul>
          </div>
          <div class="sidebar">
            <h4 class="style" id="hide1"><?php echo __('Category') ?></h4>
              <ul class="list-unstyled header" id="hidden1">
                <li><?php echo $this->Html->link(__('Technology'),array('controller' => 'articles','action' =>'index_filter','?' => array('cat_id'=>1)));?> </li>
                <li><?php echo $this->Html->link(__('Science and Health'),array('controller' => 'articles','action' =>'index_filter','?' => array('cat_id'=>2))); ?> </li>
                <li><?php echo $this->Html->link(__('Random Articles'),array('controller' => 'articles','action'=>'index_filter','?' => array('cat_id'=>3)));?></li>
              </ul>
          </div>
          <div class="sidebar">
            <h4 class="style"><?php echo __('Popular Articles') ?></h4>
              <ul class= "list-unstyled header" id= "hidden1">
                <li style="font-size:12px; color: gray;">
                  <?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles','action' => 'view', $article['Article']['id']));?> &nbsp;
                  <?php echo $this->Html->tag('span',$this->Text->truncate($article['Article']['body'],150));?>
                </li>
              </ul>
          </div>
      </div>



