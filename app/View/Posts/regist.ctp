<?php
$this->assign('title','regist New');
?>

<?= $this->Form->create('post'); ?>
<?= $this->Form->input('task_name'); ?>
<?= $this->Form->input('comment'); ?>
<?= $this->Form->input('nittei'); ?>
<?= $this->Form->button('予定追加'); ?>
<?= $this->Form->end(); ?>