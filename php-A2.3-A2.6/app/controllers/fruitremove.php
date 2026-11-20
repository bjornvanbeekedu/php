<?php
  function fruitremove() {
    require_once __DIR__ . "/../core/database.php";
    $conn = connDb();

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'], $_SESSION['account']) && is_numeric($_GET['id'])) {
      $query = "DELETE FROM fruits WHERE id = {$_GET['id']}";
      performQuery($conn, $query);
      
      if ($conn->query($query) === TRUE) {
        header("Location: ?controller=fruits");
      } else {
        $form =  "Error: " . $query . "<br>" . $conn->error;
      }
    } else {
      $error = "
        <h2>401 - U moet ingelogd zijn om deze functie te gebruiken</h2>
        <a href='?controller=home'>Ga terug</a>
      ";
      http_response_code(401);
    }

    return $error;
  }
?>