<?php
  // datum van vandaag
  $vandaag = date("Y-m-d");
  $jaren = 0;

  // datum ingevuld?
  if (isset($_GET["geboortedatum"]) && $_GET["geboortedatum"] != "") {
    // datums maken
    $geboortedatum = date_create($_GET["geboortedatum"]);
    $datumVandaag = date_create($vandaag);

    // verschil in jaren
    $verschil = date_diff($datumVandaag, $geboortedatum);
    $jaren = $verschil->format("%y");
  }
?>
<!DOCTYPE html>
<html>
  <body>
    <form action="" method="GET">
      <label for="geboortedatum">Voer uw geboorte datum in</label><br>
      <input id="geboortedatum" type="date" name="geboortedatum" value="<?php echo $vandaag; ?>"><br>
      <input type="submit">
    </form>
    <?php
      // leeftijd tonen
      if ($jaren > 0) {
        echo "<p>U bent $jaren jaar oud.</p>";
      }
    ?>
  </body>
</html>
