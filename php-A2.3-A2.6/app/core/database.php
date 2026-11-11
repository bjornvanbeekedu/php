<?php
  // .env inladen
  require_once __DIR__ . "/EnvLoader.php";
  EnvLoader::load(__DIR__ . "/../../.env");

  // verbinding met database
  function connDb(): mysqli {
    $mysqli = new mysqli($_ENV["DB_HOST"], $_ENV["DB_USER"], $_ENV["DB_PASS"], $_ENV["DB_NAME"]);

    // stoppen bij fout
    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli->connect_error;
      exit();
    }

    return $mysqli;
  }

  // query uitvoeren
  function performQuery(mysqli $conn, string $query) {
    return $conn->query($query);
  }
?>