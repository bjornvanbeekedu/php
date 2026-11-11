<?php
  // standaard prijs
  $prijs = 12;
  $uitkomst = "";

  // leeftijd ingevuld?
  if (isset($_GET["leeftijd"])) {
    $leeftijd = $_GET["leeftijd"];

    // korting per leeftijd
    if ($leeftijd < 3) {
    } elseif ($leeftijd >= 3 && $leeftijd <= 16) {
      // 50% korting
      $prijs = $prijs / 2;
    } elseif ($leeftijd >= 65) {
      // 25% korting
      $prijs = $prijs - ($prijs / 4);
    }

    // prijs tonen
    $uitkomst = "Uw prijs is: €$prijs";
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h2>Bereken de prijs van een boottocht voor vier leeftijdsgroepen</h2>
    <form action="" method="GET">
      <input name="leeftijd" placeholder="Leeftijd">
      <input type="submit" value="Bereken prijs">
    </form>
    <div>
      <h4>De standaard prijs is €12</h4>
      <p>Jonger dan 3 jaar is gratis, 3 t/m 16 jaar krijgt 50% korting en Vanaf 65 jaar krijgt u 25% korting</p>
    </div>
    <hr>
    <br>
    <?php echo $uitkomst; ?>
  </body>
</html>
