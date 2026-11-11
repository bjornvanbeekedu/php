<?php
  // pagina laden via ?controller=
  function loadPage() {
    // standaard home
    $controller = "home";
    if (!empty($_GET["controller"])) {
      $controller = $_GET["controller"];
    }

    // toegestane pagina's
    $allowedPages = ["home", "page1", "page2", "fruits", "fruitshow", "fruitadd"];

    // onbekend = 404
    if (!in_array($controller, $allowedPages, true)) {
      http_response_code(404);
      echo "Page not found - 404";
      exit;
    }

    // controller bestand laden
    include __DIR__ . "/../controllers/" . $controller . ".php";

    // functie met zelfde naam starten
    if (function_exists($controller)) {
      return $controller();
    }
  }
?>