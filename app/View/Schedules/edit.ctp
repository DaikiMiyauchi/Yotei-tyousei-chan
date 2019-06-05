<div class="schedules form">
<h1><a href="/schedules/index">予定調整ちゃん</a></h1>

<?php echo $this->Form->create('Schedule'); ?>
    <fieldset>
        <legend><?php echo __('◎予定編集'); ?></legend>
        <?php 
        $i=0;
        foreach($hoge as $value){
        $scheduleName = $value['Schedule']['scheduleName'];
        $memo = $value['Schedule']['memo'];
        $createdby = $value['Schedule']['createdby'];
        $id = $value['Schedule']['id'];
        $nittei = $value['Schedule']['nittei'];
        $boxs = array();
        $boxs=explode(",",$nittei);

        echo $this->Form->input('scheduleName',array('default' => $scheduleName));
        echo $this->Form->input('memo',array('default' => $memo));
        echo $this->Form->input('createdby',array('type' => 'hidden','default' => $createdby));
        echo $this->Form->input('id',array('type' => 'hidden','default' => $id));
        echo $this->Form->input('updateAt',array('type' => 'hidden','default' => date("Y/m/d H:i:s")));

        foreach($boxs as $box){
          echo $box;
          /* 第一引数の.（ピリオド)で区切られた最後の要素が出力される仕様 
          http://www.searchlight8.com/cakephp-formhelper-div-label/
          ここで解決
          */
          
            echo $this->Form->input('schedule.kouho.'.$i, array(
            'options' => array('出席','欠席','未定'),
            'empty' => '(予定を選択)',
            'label'=>false,
            'div'=>false
        ));
          echo '<br>';
          $i++;
        }
      }
    ?>
    </fieldset>

<?php echo $this->Form->end(__('変更を反映')); 
  echo '<a class="btn btn-info" href="/schedules/delete?id='.$id.'">◎予定を削除する</a>';
  // echo $this->Form->submit('予定を削除する', 
  //       array(
  //           'url' => '/schedules/delete', 
  //           'onClick'=>'return confirm("本当に削除してもよろしいですか?");'
  //       )
  //   ); 
?></div>
