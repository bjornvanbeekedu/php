<?php
  $getallen = "";

  // knop ingedrukt?
  if (isset($_POST["submit"])) {
    // 0 t/m 90, stap 10
    for ($i = 0; $i <= 90; $i = $i + 10) {
      $getallen = $getallen . $i . " ";
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h2>Tellen van 0-90 met stappen van 10</h2>
    <form action="" method="POST">
      <input type="submit" name="submit">
    </form>
    <?php echo $getallen; ?>
  </body>
</html>
