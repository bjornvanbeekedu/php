<?php
  function apifruits() {
    header("Content-Type: application/json; charset=utf-8");

    require_once __DIR__ . "/../core/database.php";
    $conn = connDb();

    $result = performQuery($conn, "SELECT id, name, color, sweetness FROM fruits ORDER BY name ASC");
    
    $fruits = [];

    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $fruits[] = [
          "id"        => (int) $row["id"],
          "name"      => $row["name"],
          "color"     => $row["color"],
          "sweetness" => (int) $row["sweetness"]
        ];
      }
    }

    $response = [
      "success" => true,
      "message" => "Fruitsoorten opgehaald",
      "data"    => $fruits,
      "errors"  => null
    ];

    echo json_encode($response, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
    exit;
  }
?>