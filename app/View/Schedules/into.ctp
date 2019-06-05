<html>
<title>予定内容</title>
<fieldset>
<h1><a href="/schedules/index">予定調整ちゃん</a></h1>
<p>予定の内容を表示しています</p>

<h3>予定内容</h3>
<table>

</table>
<?php
function shukketu($put){
  if($put=='0'){
    $put = '出席';
    return $put;
  }else if($put=='1'){
    $put = '欠席';
    return $put;
  }else if($put=='2'){
    $put = '未定';
    return $put;
  }
}

foreach($find_result as $id_syousai){

  echo '予定名 : ';
  echo $id_syousai['Schedule']['scheduleName'];
  echo '<br>';

  echo 'コメント : ';
  echo $id_syousai['Schedule']['memo'];
  echo '<br>';

  echo '作成者 : ';
  echo $id_syousai['Schedule']['createdby'];
  echo '<br>';

  echo '最終更新日時 : ';
  echo $id_syousai['Schedule']['updateAt'];
  echo '<br>';

  echo '候補日程一覧 : ';
  echo '<br>';


  $nitteis = $nittei_array;
  $kouhos = $kouho_array;
  $i=0;

  foreach($nitteis as $nittei){
    if ($kouhos[0] != null) {
      $syukketu = shukketu($kouhos[$i]);
    }else{
      $syukketu = '未定';
    }
      echo $nittei.' : '.$syukketu.'<br>';
      $i++;
  }
}

echo '<a class="btn btn-info" href="/schedules/edit?id='.$id_syousai['Schedule']['id'].'">◎予定を編集する</a>';

?>