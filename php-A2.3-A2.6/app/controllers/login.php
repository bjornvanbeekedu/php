<?php
  function login() {
    require_once __DIR__ . "/../core/database.php";
    $conn = connDb();

    $form = "
      <h2>Login</h2>
      <form method='post' action=''>
        <input type='text' name='username' placeholder='Username' autocomplete='username' min='3' max='12' required><br>
        <input type='email' name='email' placeholder='Email' autocomplete='email' required><br>
        <input type='password' name='password' placeholder='Password' autocomplete='current-password' min='8' required><br>
        <input type='submit' name='login' value='Login'>
        <input type='submit' name='register' value='Register'>
      </form>
    ";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["username"], $_POST["email"], $_POST["password"])) {
      $username = $_POST["username"];
      $email = $_POST["email"];
      $password = $_POST["password"];

      if (isset($_POST["login"])) {
        $query = "SELECT username, email, password FROM users WHERE username = '$username' AND email = '$email' LIMIT 1";
        $result = performQuery($conn, $query);
        
        if ($result->num_rows === 1) {
          $user = $result->fetch_assoc();
          if (password_verify($password, $user["password"])) {
            $_SESSION["account"] = ["username" => $user["username"], "email" => $user["email"]];
            header("Location: ?controller=home");
          } else {
            $form .= "Wachtwoord onjuist.";
          }
        } else {
          $form .= "Account niet gevonden.";
        }
      } elseif (isset($_POST["register"])) {
        $query = "SELECT username, email FROM users WHERE username = '$username' OR email = '$email'";
        $result = performQuery($conn, $query);

        if ($result->num_rows == 0) {
          $hashedPass = password_hash($password, PASSWORD_DEFAULT);
          performQuery($conn, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPass')");
          
          $form .= "Account is aangemaakt.";
          
        } elseif ($result->num_rows >= 1) {
          $usernameTaken = false;
          $emailTaken = false;

          while ($row = $result->fetch_assoc()) {
            if ($row['username'] === $username) { $usernameTaken = true; }
            if ($row['email'] === $email) { $emailTaken = true; }
          }

          if ($usernameTaken && $emailTaken) {
            $form .= "Username en Email zijn al in gebruik.";
          } elseif ($usernameTaken) {
            $form .= "Username is al in gebruik.";
          } elseif ($emailTaken) {
            $form .= "Email is al in gebruik.";
          }
        }
      } else {
        http_response_code(400);
      }
    }

    if (!empty($_SESSION["account"])) {
      $form .= "U bent al ingelogd.";
    }

    return $form;    
  }
?>