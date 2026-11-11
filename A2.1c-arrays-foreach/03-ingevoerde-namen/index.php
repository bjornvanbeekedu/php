<?php
  $lijst = "";

  // namen verstuurd?
  if (isset($_POST["namen"])) {
    // splitsen op spatie
    $namen = explode(" ", $_POST["namen"]);

    // elke naam op eigen regel
    foreach ($namen as $naam) {
      $lijst = $lijst . htmlspecialchars($naam) . "<br>";
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h2>Toon ingevoerde namen onder elkaar</h2>
    <form action="" method="POST">
      <input name="namen" placeholder="Namen">
      <input type="submit" value="Toon namen">
    </form>
    <br>
    <?php echo $lijst; ?>
  </body>
</html>
