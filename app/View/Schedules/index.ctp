<fieldset>
<h1>予定調整ちゃん</h1>
<p>予定調整ちゃんは、かわいいかわいい女の子です</p>

<div> 
<a class="btn btn-info" href="/schedules/add"> 予定を作る</a>
 </div>

<h2><?php echo $username.'の予定一覧'; ?></h2>

<h3><a href="/users/login">ログアウト</a></h3>

<table border="1">
<tr>
  <th>予定名</th>
  <th>作成者</th>
  <th>最終更新日時</th>
</tr>
<?php
foreach($hoge as $value){
  echo '<tr>';
  echo '<td>'.$value['Schedule']['scheduleName'].'</td>';
  echo '<td>'.$value['Schedule']['createdby'].'</td>';
  echo '<td>'.$value['Schedule']['updateAt'].'</td>';
  echo '<td><a class="btn btn-info" href="/schedules/into?id='.$value['Schedule']['id'].'">詳細</a></td>';
  echo '</tr>';
}
?>
</table>
</fieldset>