<?php
  // lijst met talen
  $programmeertalen = ["PHP", "C#", "HTML", "Javascript", "Java", "C++", "C"];

  // twee talen erbij zetten
  array_push($programmeertalen, "Python", "Swift");

  // op alfabet zetten
  sort($programmeertalen);

  // elke taal op eigen regel
  $lijst = "";
  foreach ($programmeertalen as $taal) {
    $lijst = $lijst . $taal . "<br>";
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h2>Sorteer en tel negen programmeertalen</h2>
    <?php echo $lijst; ?>
  </body>
</html>
