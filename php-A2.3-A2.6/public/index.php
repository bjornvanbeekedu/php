<?php
  session_start();

  require_once __DIR__ . '/../app/core/trigger.php';

  

  $content = loadPage();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <header>
      <a href="?controller=home">Home</a>
      <a href="?controller=page1">Page 1</a>
      <a href="?controller=page2">Page 2</a>
      <a href="?controller=fruits">Fruits Database</a>
      <?php if (empty($_SESSION["account"])): ?>
        <a href="?controller=login">Sign in</a>
      <?php else: ?>
        <a href="?controller=logout">Sign out</a>
      <?php endif; ?>
    </header>
    
    <main><?= $content ?></main>
  </body>
</html>