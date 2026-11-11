<?php
  // fruit toevoegen
  function fruitadd() {
    // database verbinding
    require_once __DIR__ . "/../core/database.php";
    $conn = connDb();

    // formulier
    $form = "
      <h2>Fruit toevoegen</h2>

      <form action='' method='POST'>
        <input type='text' placeholder='Name' name='name' required><br><br>
        <input type='text' placeholder='Color' name='color' required><br><br>
        <input type='number' placeholder='Sweetness' name='sweetness' required><br><br>

        <input type='submit' name='submit' value='Voeg toe'>
      </form>
    ";

    // formulier verstuurd?
    if (isset($_POST["name"]) && isset($_POST["color"]) && isset($_POST["sweetness"])) {
      $name = $_POST["name"];
      $color = $_POST["color"];
      $sweetness = $_POST["sweetness"];

      // sweetness een getal?
      if (is_numeric($sweetness)) {
        // fruit opslaan (1 keer)
        $query = "INSERT INTO fruits (name, color, sweetness) VALUES ('$name', '$color', '$sweetness')";

        // gelukt? terug naar lijst
        if (performQuery($conn, $query) === TRUE) {
          header("Location: ?controller=fruits");
        } else {
          $form = "Error: " . $query . "<br>" . $conn->error;
        }
      }
    }

    return $form;
  }
?>