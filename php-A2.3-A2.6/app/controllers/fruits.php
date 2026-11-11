<?php
  // lijst met al het fruit
  function fruits() {
    // database verbinding
    require_once __DIR__ . "/../core/database.php";
    $conn = connDb();

    // fruit ophalen op naam
    $result = performQuery($conn, "SELECT id, name, color, sweetness FROM fruits ORDER BY name ASC");
    $table = "";

    // fruit gevonden?
    if ($result->num_rows > 0) {
      // rij per fruit
      while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $name = $row["name"];
        $color = $row["color"];
        $sweetness = $row["sweetness"];

        $table = $table . "<tr><td>$id</td><td>$name</td><td>$color</td><td>$sweetness</td>";
        $table = $table . "<td><a href='?controller=fruitshow&id=$id'>👁</a></td></tr>";
      }

      // aantal onderaan
      $aantal = $result->num_rows;
      $table = $table . "<tr><td colspan='5'>Aantal fruitsoorten: $aantal</td></tr>";
    } else {
      // geen fruit
      $table = "<tr><td colspan='5'>Geen fruit gevonden</td></tr>";
    }

    // pagina maken
    $output = "
      <h2>Fruits Database</h2>
      <a href='?controller=fruitadd'>+ Fruit toevoegen</a><br><br>
      <table>
        <tr>
          <th>ID</th>
          <th>name</th>
          <th>color</th>
          <th>sweetness</th>
          <th>bekijken</th>
        </tr>
        $table
      </table>
    ";

    // verbinding sluiten
    $conn->close();

    return $output;
  }
?>