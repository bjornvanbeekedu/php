<?php
  // standaard wit
  $kleur = "white";

  // gekozen kleur ophalen
  if (isset($_GET["kleur"])) {
    $kleur = htmlspecialchars($_GET["kleur"]);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body style="background-color: <?php echo $kleur; ?>">
    <h2>Verander de achtergrondkleur met een formulier</h2>
    <form action="" method="GET">
      <select name="kleur">
        <option value="aqua">aqua</option>
        <option value="lime">lime</option>
      </select>
      <input type="submit" value="Set">
    </form>
  </body>
</html>
