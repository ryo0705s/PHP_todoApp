<?php

// require('./main.js');
function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
// $hoge = [];
$todo = [];
$todos = [];
$fileName = '../app/data.txt';
if (!empty($_POST['content'])){
  $fp = fopen($fileName,'a');
  $todo = $_POST['content'];
  // $todo = filter_input(INPUT_POST, 'content');
  fwrite($fp, $todo . "\n");
  fclose($fp);
  $todos = file($fileName, FILE_IGNORE_NEW_LINES);
}
if (isset($_POST['del'])){
  $fp = fopen($fileName,'w');
  foreach($todos as $key => $newtodos){
    if($key != $_POST['del']){
      fwrite($fp, $newtodos."\n");
  }
  }
  fclose($fp);
}
// if(isset($_POST['del'])){
//   $fp = fopen("data.txt", 'w');
//   foreach($BOARD as $key => $NEWBOARD){
//       if($key != $_POST['del']){
//           fwrite($fp, $NEWBOARD."\n");
//       }
//   }
//   fclose($fp);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>My Todos</title>
</head>
<body>
  <h1>Todos</h1>
  <p>やること</p>
  <ul>
    <?php foreach($todos as $key => $todo): ?>
      <li><?= h($key) ?></li>
      <li><?= h($todo) ?></li>
      <form action="" method="post">
  <input type="" name="del" value="<?=$key; ?>">
  <button>削除</button>
  </form>
      <?php endforeach; ?>
    </ul>
    
  <form action="" method="post">
  <input type="text" name="content">
  <button>追加</button>
  </form>

</body>
</html>