<?php
  function logout() {
    $ren = "
      <form method='POST' action=''>
        <h2>Uitloggen</h2>
        <p>U bent ingelogged als {$_SESSION['account']['email']}, weet u zeker dat u wilt uitloggen?</p>
        <button>Uitloggen</button>
        <a href='?controller=home'>Annuleer</a>
      </form>
    "; 

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $_SESSION = [];
      session_destroy();
      header("Location: ?controller=home");
    }


    return $ren;
  }
?>