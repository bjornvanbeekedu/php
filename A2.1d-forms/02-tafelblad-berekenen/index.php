<?php
  $uitkomst = "";

  // hout en vorm gekozen?
  if (isset($_POST["hout"]) && isset($_POST["vorm"])) {
    // invoer ophalen
    $hout = $_POST["hout"];
    $vorm = $_POST["vorm"];
    $breedte = $_POST["breedte"];
    $hoogte = $_POST["hoogte"];

    // prijs per m2
    $houtPrijs = 0;
    switch ($hout) {
      case "donker-eiken":
        $houtPrijs = 9.50;
        break;
      case "eiken":
        $houtPrijs = 8.50;
        break;
      case "berken":
        $houtPrijs = 11.50;
        break;
    }

    // maten een getal?
    if (is_numeric($breedte) && is_numeric($hoogte)) {
      if ($vorm == "rechthoek") {
        // breedte x hoogte
        $oppervlakte = $breedte * $hoogte;
      } else {
        // schuine lijn = doorsnede
        $doorsnede = sqrt($breedte * $breedte + $hoogte * $hoogte);
        $straal = $doorsnede / 2;
        // oppervlakte cirkel
        $oppervlakte = $straal * $straal * pi();
      }

      // prijs berekenen
      $totaal = round($oppervlakte * $houtPrijs);
      $uitkomst = "<p>Oppervlakte: " . round($oppervlakte) . "m&sup2; </p>";
      $uitkomst = $uitkomst . "<p>Totaal: €$totaal</p>";
    } else {
      // foutmelding
      $uitkomst = "<p>Vul bij breedte en hoogte een getal in.</p>";
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h2>Bereken de prijs van een rond of rechthoekig tafelblad</h2>
    <form action="" method="POST">
      <table>
        <tr>
          <td><img src="./assets/img_01.jpg" height="275" width="275"></td>
          <td><img src="./assets/img_02.jpg" height="275" width="275"></td>
          <td><img src="./assets/img_03.jpg" height="275" width="275"></td>
        </tr>
        <tr>
          <td><input type="radio" name="hout" value="donker-eiken">Donker eiken hout (€ 9,50/m²)</td>
          <td><input type="radio" name="hout" value="eiken">Eiken hout (€ 8,50/m²)</td>
          <td><input type="radio" name="hout" value="berken">Berken hout (€ 11,50/m²)</td>
        </tr>
      </table><br>
      <input type="radio" name="vorm" value="rechthoek">Rechthoekig<br>
      <input type="radio" name="vorm" value="rond">Rond<br><br>
      <input type="text" name="breedte" placeholder="width"><br>
      <input type="text" name="hoogte" placeholder="height"><br><br>
      <input type="submit" value="Bereken">
    </form>
    <?php echo $uitkomst; ?>
  </body>
</html>
