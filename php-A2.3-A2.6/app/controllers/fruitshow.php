<?php
  // een fruit bekijken
  function fruitshow() {
    // database verbinding
    require_once __DIR__ . "/../core/database.php";
    $conn = connDb();
    $output = "";

    // geen id
    if (!isset($_GET["id"])) {
      http_response_code(400);
      $output = "
        <article>
          <h2>Id Ontbreekt</h2>
          <p>Er is geen id opgegeven.</p>
          <a href='?controller=fruits'>Ga terug</a>
        </article>
      ";
    // id geen getal
    } elseif (!is_numeric($_GET["id"])) {
      http_response_code(400);
      $output = "
        <article>
          <h2>Id Ongeldig</h2>
          <p>Gebruik een heel getal als id.</p>
          <a href='?controller=fruits'>Ga terug</a>
        </article>
      ";
    // id is goed
    } else {
      // fruit ophalen
      $id = $_GET["id"];
      $result = performQuery($conn, "SELECT * FROM fruits WHERE id = $id");

      // fruit gevonden?
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $color = $row["color"];
        $sweetness = $row["sweetness"];
        $fruitId = $row["id"];

        // fruit tonen
        $output = "
          <article>
            <h2>$name</h2>
            <table>
              <tr>
                <th align='left'>ID:</th>
                <td>$fruitId</td>
              </tr>
              <tr>
                <th align='left'>Name:</th>
                <td>$name</td>
              </tr>
              <tr>
                <th align='left'>Color:</th>
                <td>$color</td>
              </tr>
              <tr>
                <th align='left'>Sweetness:</th>
                <td>$sweetness/10</td>
              </tr>
            </table><br>
            <a href='?controller=fruits'>Ga terug</a>
          </article>
        ";
      } else {
        // niet gevonden
        $output = "
          <article>
            <h2>Fruit niet gevonden</h2>
            <p>Er bestaat geen fruit record met de id $id.</p>
          </article>
        ";
      }
    }

    // verbinding sluiten
    $conn->close();

    return $output;
  }
?>