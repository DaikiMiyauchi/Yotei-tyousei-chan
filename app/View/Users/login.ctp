<div class="users form">
<?php echo $this->Flash->render('auth'); ?>

<?php echo $this->Form->create('User'); ?>
    <fieldset>
    <h1>アカウントの作成は<a href="/users/add">コチラ</a></h1>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('ログイン')); ?>
</div>
