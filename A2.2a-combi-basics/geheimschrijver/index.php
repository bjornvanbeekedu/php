<?php
  // functies laden
  include "functions.php";

  $uitkomst = "";

  // tekst verstuurd?
  if (isset($_POST["tekst"])) {
    $tekst = $_POST["tekst"];

    // versleutelen of ontsleutelen
    if ($_POST["actie"] == "Encrypt") {
      $resultaat = versleutel($tekst);
      $soort = "Versleutelde tekst";
    } else {
      $resultaat = ontsleutel($tekst);
      $soort = "Onversleutelde tekst";
    }

    // nieuwe tekst en veranderingen
    $nieuweTekst = $resultaat[0];
    $veranderingen = $resultaat[1];

    // resultaat tonen
    $uitkomst = "<h3>Resultaat</h3>";
    $uitkomst = $uitkomst . "<p><b>Ingevoerde tekst: </b>" . htmlspecialchars($tekst) . "</p>";
    $uitkomst = $uitkomst . "<p><b>$soort: </b>" . htmlspecialchars($nieuweTekst) . "</p>";
    $uitkomst = $uitkomst . "<p><b>Veranderde karakters: </b>" . htmlspecialchars($veranderingen) . "</p>";

    // uitleg tonen
    $uitkomst = $uitkomst . "<h3>Hoe werkt het?</h3>";
    $uitkomst = $uitkomst . "<p>Elke kleine letter wordt de volgende letter in het alfabet</p>";
    $uitkomst = $uitkomst . "<p>Alle hoofdletters, cijfers, of speciale tekens blijven gelijk</p>";
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h2>Maak een geheimschrijver in PHP</h2>
    <form action="" method="POST">
      <textarea name="tekst" rows="4" cols="50"></textarea><br>
      <input type="submit" name="actie" value="Encrypt">
      <input type="submit" name="actie" value="Decrypt">
    </form>
    <?php echo $uitkomst; ?>
  </body>
</html>
