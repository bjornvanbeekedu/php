<?php
  $tafels = "";

  // velden verstuurd?
  if (isset($_GET["tafel"]) && isset($_GET["begin"]) && isset($_GET["eind"])) {
    // invoer ophalen
    $tafel = $_GET["tafel"];
    $begin = $_GET["begin"];
    $eind = $_GET["eind"];

    // alles een getal?
    if (is_numeric($tafel) && is_numeric($begin) && is_numeric($eind)) {
      // tafel van begin t/m eind
      for ($i = $begin; $i <= $eind; $i++) {
        $uitkomst = $i * $tafel;
        $tafels = $tafels . "$i * $tafel = $uitkomst <br>";
      }
    } else {
      // foutmelding
      $tafels = "Vul bij alle velden een getal in.";
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h2>Toon een zelfgekozen tafel tussen twee getallen</h2>
    <form action="" method="GET">
      <input name="tafel" placeholder="tafel"><br>
      <input name="begin" placeholder="beginwaarde"><br>
      <input name="eind" placeholder="eindwaarde"><br>
      <input type="submit">
    </form>
    <br><hr>
    <?php echo $tafels; ?>
  </body>
</html>
