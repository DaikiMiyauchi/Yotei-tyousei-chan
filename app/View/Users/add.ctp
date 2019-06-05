<!-- app/View/Users/add.ctp -->
<div class="users form">
<h1>アカウント作成済みの方は<a href="/users/login">コチラ</a></h1>

<?php echo $this->Form->create('アカウントを作成する'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('作成')); ?>
</div>