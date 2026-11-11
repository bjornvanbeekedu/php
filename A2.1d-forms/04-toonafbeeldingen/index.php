<?php
  $uitkomst = "";

  // knop ingedrukt?
  if (isset($_POST["submit"])) {
    // merk gekozen?
    if (isset($_POST["merken"])) {
      // per merk twee plaatjes
      foreach ($_POST["merken"] as $merk) {
        $merk = htmlspecialchars($merk);

        // mapnaam in kleine letters
        $map = strtolower($merk);

        $uitkomst = $uitkomst . "<h3>$merk</h3>";
        $uitkomst = $uitkomst . "<img src='assets/$map/img_1.png' width='450px' height='250px'>\n";
        $uitkomst = $uitkomst . "<img src='assets/$map/img_2.png' width='450px' height='250px'>\n";
      }
    } else {
      // geen keuze
      $uitkomst = "<p><b>Maak een keuze!</b></p>";
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h2>Toon twee afbeeldingen per gekozen automerk</h2>
    <form action="" method="POST">
      <input type="checkbox" name="merken[]" value="Mercedes-Benz">Mercedes-Benz<br>
      <input type="checkbox" name="merken[]" value="Volvo">Volvo<br>
      <input type="checkbox" name="merken[]" value="Audi">Audi<br>

      <input type="submit" name="submit" value="Bevestig">
    </form>
    <?php echo $uitkomst; ?>
  </body>
</html>
