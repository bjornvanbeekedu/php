<?php
  // leest het .env bestand
  class EnvLoader {
    // .env inladen, true als het lukt
    public static function load(string $path): bool {
      // bestand bestaat niet
      if (!file_exists($path)) {
        return false;
      }

      // bestand niet leesbaar
      if (!is_readable($path)) {
        throw new RuntimeException("The .env file at $path is not readable.");
      }

      // alle regels ophalen
      $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

      foreach ($lines as $line) {
        $line = trim($line);

        // lege regel of comment overslaan
        if ($line == "" || str_starts_with($line, "#") || str_starts_with($line, "//")) {
          continue;
        }

        // geen = dan overslaan
        if (!str_contains($line, "=")) {
          continue;
        }

        // splitsen in key en value
        $parts = explode("=", $line, 2);
        $key = trim($parts[0]);
        $value = trim($parts[1]);

        // quotes weghalen
        if (str_starts_with($value, '"') && str_ends_with($value, '"')) {
          $value = substr($value, 1, -1);
        } elseif (str_starts_with($value, "'") && str_ends_with($value, "'")) {
          $value = substr($value, 1, -1);
        }

        // waarde opslaan
        putenv("$key=$value");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
      }

      return true;
    }
  }
