<?php
function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$todos = filter_input(INPUT_POST, "content");
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
    <?php foreach($todos as $todo): ?>
      <li><?= h($todo) ?></li>
      <?php endforeach; ?>
    </ul>
    
  <form action="" method="post">
  <input type="text" name="content">
  <button>追加</button>
  </form>

</body>
</html>