<div class="schedules form">
<h1><a href="/schedules/index">予定調整ちゃん</a></h1>
<?php echo $this->Form->create('Schedule'); ?>
    <fieldset>
        <legend><?php echo __('予定作成'); ?></legend>
        <table>
        <?php 
        $username = $username;
        echo $this->Form->input('scheduleName');
        echo $this->Form->input('memo');
        echo $this->Form->input('createdby',array('type' => 'hidden','default' => $username));
        echo $this->Form->input('nittei');
        echo $this->Form->input('updateAt',array('type' => 'hidden','default' => 'null'));
        echo $this->Form->input('updateAt',array('type' => 'hidden','default' => date("Y/m/d H:i:s")));
    ?>
        </table>
    </fieldset>
<?php echo $this->Form->end(__('予定を追加')); ?>
</div>
