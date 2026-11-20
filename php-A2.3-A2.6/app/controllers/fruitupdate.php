<?php 
  function fruitupdate() {
    require_once __DIR__ . "/../core/database.php";
    $conn = connDb();

    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]) && is_numeric($_GET["id"])) {
      $result = performQuery($conn, "SELECT * FROM fruits WHERE id = {$_GET['id']}");

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $form = "
          <h2>Fruit wijzigen</h2>

          <form action='' method='POST'>
            Name: <input type='text' placeholder='Name' name='name' value='{$row["name"]}' required><br><br>
            Color: <input type='text' placeholder='Color' name='color' value='{$row["color"]}' required><br><br>
            Sweetness: <input type='number' placeholder='Sweetness' name='sweetness' min='1' max='10' value='{$row["sweetness"]}' required><br><br>

            <input type='submit' name='submit' value='Pas aan'><br>
            <a href='?controller=fruits'>Ga terug</a>
          </form>
        ";
      } else {
        $form = "
          <article>
            <h2>Fruit niet gevonden</h2>
            <p>Er bestaat geen fruit record met de id {$_GET['id']}.</p>
            <a href='?controller=fruits'>Ga terug</a>
          </article>
        ";
        http_response_code(400);
      }
    } elseif (!isset($_GET["id"])) {
      $form = "
        <article>
          <h2>Id Ontbreekt</h2>
          <p>Er is geen id opgegeven.</p>
          <a href='?controller=fruits'>Ga terug</a>
        </article>
      ";
      http_response_code(400);
    } elseif (!is_numeric($_GET["id"])) {
      $form = "
        <article>
          <h2>Id Ongeldig</h2>
          <p>Gebruik een heel getal als id.</p>
          <a href='?controller=fruits'>Ga terug</a>
        </article>
      ";
      http_response_code(400);
    }
    
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["name"], $_POST["color"], $_POST["sweetness"]) && is_numeric($_POST["sweetness"])) {
      $query =  "UPDATE fruits SET name = '{$_POST["name"]}', color = '{$_POST["color"]}', sweetness = '{$_POST["sweetness"]}' WHERE id = '{$_GET["id"]}'";
      performQuery($conn, $query);

      if ($conn->query($query) === TRUE) {
        header("Location: ?controller=fruits");
      } else {
        $form =  "Error: " . $query . "<br>" . $conn->error;
      }
    }

    return $form;
  }
?>