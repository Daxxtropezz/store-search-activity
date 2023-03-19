<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Activity 3 | ITEC 106A</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Local CSS -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="img/favicon.ico">
</head>

<body>
  <h1>Store</h1>
  <div class="box">
    <form action="index.php" method="POST">

      <div class="input-box">
        <input required id="user" name="word" type="text" maxlength="15" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" oninvalid="this.setCustomValidity('Please:\nEnter a word before proceeding!')">
        <label for="user">Word</label>
      </div>

      <div class="input-buttons">
        <input type="submit" value="STORE" onclick="storeData()">
        <i class="fa-solid fa-user"></i>
        <p></p>
        <a href="search.php">Search</a>
      </div>

    </form>
  </div>
</body>

</html>

<script>
  function storeData() {
    <?php

    extract($_POST);
    $file = 'txt/storage.txt';
    $fileWrite = fopen($file, "a");
    $location = count(file($file));

    if ($word == "") {
    } else {
      if ($location == 0) {
        fwrite($fileWrite, $word);
      } else if ($location <= 9) {
        fwrite($fileWrite, "\n" . $word);
      } else {
        echo 'alert("YOU HAVE REACHED THE CAPACITY OF ', $location, ' FROM STORING DATA!");';
      }
      fclose($fileWrite);
    }

    ?>
  }
</script>

<!-- SUBMITTED BY:
JOHN PAUL S. MIRAFLORES
RISTY ANN J. BAHIAN -->