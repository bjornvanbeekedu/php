<?php
  $patroon = "";

  // knop ingedrukt?
  if (isset($_POST["submit"])) {
    // 5 regels
    for ($regel = 1; $regel <= 5; $regel++) {
      // sterren = regelnummer
      for ($ster = 1; $ster <= $regel; $ster++) {
        $patroon = $patroon . "*";
      }
      // nieuwe regel
      $patroon = $patroon . "<br>";
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h2>Een patroon van vijf regels met sterren</h2>
    <form action="" method="POST">
      <input type="submit" name="submit">
    </form><br>
    <?php echo $patroon; ?>
  </body>
</html>
