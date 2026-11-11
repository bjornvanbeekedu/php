<?php
  // standaard foutmelding
  $uitkomst = "De velden zijn niet correct ingevuld.";

  // velden ingevuld?
  if (isset($_GET["deeltal"]) && isset($_GET["deler"])) {
    // invoer naar getal
    $deeltal = intval($_GET["deeltal"]);
    $deler = intval($_GET["deler"]);

    // met 0 kan je niet delen
    if ($deeltal != 0 && $deler != 0) {
      // hoe vaak past het
      $keer = floor($deler / $deeltal);

      // uitkomst kiezen
      if ($keer >= 1) {
        $uitkomst = "Het deeltal past $keer keer in de deler.";
      } else {
        $uitkomst = "Het deeltal past niet in de deler.";
      }
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <form action="" method="GET">
      <input type="number" name="deeltal" placeholder="Deeltal"><br>
      <input type="number" name="deler" placeholder="Deler"><br>
      <input type="submit"><br>
    </form>
    <p><?php echo $uitkomst; ?></p>
  </body>
</html>
