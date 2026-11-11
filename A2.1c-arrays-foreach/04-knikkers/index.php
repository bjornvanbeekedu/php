<?php
  $uitkomst = "";

  // aantal verstuurd?
  if (isset($_POST["aantal"])) {
    $aantal = $_POST["aantal"];

    // alleen 0 t/m 10
    if ($aantal < 0 || $aantal > 10) {
      $uitkomst = "Je hebt maar 10 knikkers.";
    } else {
      // knikkers over
      $over = 10 - $aantal;
      $uitkomst = "Je hebt nog $over knikkers over.";
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h2>Bereken hoeveel knikkers in de zak overblijven</h2>
    <p>Er zijn 10 knikkers in de zak.</p>
    <form action="" method="POST">
      <input name="aantal" placeholder="Aantal knikkers" type="number" min="0" max="10" style="width: 110px;">
      <input type="submit" value="Gooi knikkers">
    </form>
    <br>
    <p><?php echo $uitkomst; ?></p>
  </body>
</html>
