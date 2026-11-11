<?php
  // pagina 2, met id uit de url
  function page2() {
    $result = "<h2>Page 2</h2>";

    // id meegegeven?
    if (isset($_GET["id"])) {
      $result = $result . "<p>Id count = " . $_GET["id"] . "</p>";
    }

    return $result;
  }
?>