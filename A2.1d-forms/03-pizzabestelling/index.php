<?php
  // prijzen pizza's
  $pizzaPrijzen = [
    "spianata-piccante" => 12.5,
    "seppi" => 11.5,
    "tirato" => 10.5
  ];

  // prijzen extra's
  $extraPrijzen = [
    "olijven" => 2.5,
    "kaas" => 1.5,
    "bezorgen" => 3.5
  ];

  // standaard tekst
  $uitkomst = "<p>Maak een keuze.</p>";

  // pizza gekozen?
  if (isset($_POST["pizza"])) {
    $totaal = 0;

    // pizza's optellen
    foreach ($_POST["pizza"] as $pizza) {
      $totaal = $totaal + $pizzaPrijzen[$pizza];
    }

    // extra's optellen
    if (isset($_POST["extra"])) {
      foreach ($_POST["extra"] as $extra) {
        $totaal = $totaal + $extraPrijzen[$extra];
      }
    }

    // totaal met 2 decimalen
    $uitkomst = "<p>Het totaal bedrag is: €" . number_format($totaal, 2) . "</p>";
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h2>Bereken de prijs van een pizzabestelling</h2>
    <form action="" method="POST">
      <input type="checkbox" name="pizza[]" value="spianata-piccante">Spianata Piccante (€ 12,50)<br>
      <input type="checkbox" name="pizza[]" value="seppi">Seppi (€ 11,50)<br>
      <input type="checkbox" name="pizza[]" value="tirato">Tirato (€ 10,50)<br><br>

      <input type="checkbox" name="extra[]" value="olijven">olijven (€ 2,50)<br>
      <input type="checkbox" name="extra[]" value="kaas">kaas (€ 1,50)<br><br>

      <input type="radio" name="extra[]" value="bezorgen">Laten bezorgen (€ 3,50)<br><br>
      <input type="submit" value="Bestel">
    </form>
    <?php echo $uitkomst; ?>
  </body>
</html>
