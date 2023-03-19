<?php

error_reporting(0);
$i = 0;
$result = $_POST['search'];

$location = file('txt/storage.txt');
$words = preg_grep("/$result/", $location);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Activity 3 | ITEC 105</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Local CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.ico">
</head>

<body>
    <div class="split left">
        <h1>Search</h1>
        <div class="box">
            <form action="search.php" method="POST" role="form">

                <div class="input-box">
                    <input required type="text" id="search" name="search" maxlength="15" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" oninvalid="this.setCustomValidity('Please:\nEnter a word before proceeding!')">
                    <label for="search">Word</label>
                </div>

                <div class="input-buttons">
                    <input type="submit" value="SEARCH">
                    <p></p>
                    <a href="index.php">Store</a>
                </div>

            </form>
        </div>
    </div>

    <div class="split right">
        <div class="box">
            <h2 class="text-result">Result</h2>
            <div class="input-box">
                <p class="text-result">
                    <?php
                    echo "-----------------<br>";
                    foreach ($words as $searches) {
                        $i++;
                        echo "$i. $searches<br>";
                        echo "-----------------<br>";
                    }
                    ?>
                </p>
                <br>
            </div>
            <form method="POST">
                <button onClick="window.location.href=window.location.href">RESET</button>
                <button name="clearBtn">CLEAR</button>
            </form>
        </div>
    </div>
</body>

</html>

<script>
    <?php

    if (array_key_exists('clearBtn', $_POST)) {
        clearFile();
    }

    function clearFile()
    {
        $file = 'txt/storage.txt';
        $fileDel = fopen($file, 'w');
        fclose($fileDel);

        header("Location: search.php");
    }

    ?>
</script>

<!-- SUBMITTED BY:
JOHN PAUL S. MIRAFLORES
RISTY ANN J. BAHIAN -->