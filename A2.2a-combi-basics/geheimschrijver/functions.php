<?php
  // letter een plek verder (a wordt b)
  function versleutel($tekst) {
    // alfabet en verschoven alfabet
    $alfabet = "abcdefghijklmnopqrstuvwxyz";
    $verschoven = "bcdefghijklmnopqrstuvwxyza";

    $nieuweTekst = "";
    $veranderingen = "";

    // elke letter langs
    for ($i = 0; $i < strlen($tekst); $i++) {
      $letter = $tekst[$i];

      // alleen kleine letters
      if ($letter >= "a" && $letter <= "z") {
        // nieuwe letter opzoeken
        $plek = strpos($alfabet, $letter);
        $nieuweLetter = $verschoven[$plek];

        // verandering bijhouden
        if ($veranderingen != "") {
          $veranderingen = $veranderingen . ", ";
        }
        $veranderingen = $veranderingen . "$letter → $nieuweLetter";
      } else {
        // blijft hetzelfde
        $nieuweLetter = $letter;
      }

      // letter toevoegen
      $nieuweTekst = $nieuweTekst . $nieuweLetter;
    }

    // tekst en veranderingen terug
    return [$nieuweTekst, $veranderingen];
  }

  // letter een plek terug (b wordt a)
  function ontsleutel($tekst) {
    // alfabet en verschoven alfabet
    $alfabet = "abcdefghijklmnopqrstuvwxyz";
    $verschoven = "bcdefghijklmnopqrstuvwxyza";

    $nieuweTekst = "";
    $veranderingen = "";

    // elke letter langs
    for ($i = 0; $i < strlen($tekst); $i++) {
      $letter = $tekst[$i];

      // alleen kleine letters
      if ($letter >= "a" && $letter <= "z") {
        // oude letter opzoeken
        $plek = strpos($verschoven, $letter);
        $nieuweLetter = $alfabet[$plek];

        // verandering bijhouden
        if ($veranderingen != "") {
          $veranderingen = $veranderingen . ", ";
        }
        $veranderingen = $veranderingen . "$letter → $nieuweLetter";
      } else {
        // blijft hetzelfde
        $nieuweLetter = $letter;
      }

      // letter toevoegen
      $nieuweTekst = $nieuweTekst . $nieuweLetter;
    }

    // tekst en veranderingen terug
    return [$nieuweTekst, $veranderingen];
  }
?>
