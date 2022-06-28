<?php

declare(strict_types=1);
//session_start — Start new or resume existing session
session_start();

require './Classes/Blackjack.php';
require './Classes/Player.php';
require './Classes/Card.php';
require './Classes/Deck.php';
require './Classes/Suit.php';


// Passing through all buttons

if (array_key_exists("hit", $_POST)) {
   echo "<h2>Hit Me!</h2>";
//    var_dump($_POST);

} elseif (array_key_exists("start", $_POST)) {
    echo "<h2>Start from Here!</h2>";
} elseif (array_key_exists("surrender", $_POST)) {
    echo "<h2>You Lost!</h2>";
} elseif (array_key_exists("stand", $_POST)) {
    echo "<h2>Good!</h2>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BlackJack-PHP">
    <title>BlackJack in PHP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Main Styles CSS File-->
    <link rel="stylesheet" href="styles.css">
</head>


<body class="container">
    <header class="mb-3">
        <h1 class="text-center text-red mt-3">BlackJack</h1>
    </header>



<form method="post" class="text-center" action="<?=htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     <button type="submit" name="start" class="btn btn-info">Start</button>
    <button type="submit" name="hit" class="btn btn-primary">Hit</button>
    <button type="submit" name="surrender" class="btn btn-success">Surrender</button>
    <button type="submit" name="stand" class="btn btn-danger">Stand</button>
</form>


    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>











