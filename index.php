<?php

declare(strict_types=1);
//session_start — Start new or resume existing session
session_start();

require './Classes/Blackjack.php';
require './Classes/Player.php';
require './Classes/Card.php';
require './Classes/Deck.php';
require './Classes/Suit.php';


$blackjack = new Blackjack();
$_SESSION["Blackjack"] = $blackjack;


if (!isset($_SESSION['Blackjack'])) {
    echo "variable blackjack not found, creating new object";
    $blackjack = new Blackjack();
    //put the blackjack in the session
    $_SESSION['Blackjack'] = $blackjack;
}else if (isset($_SESSION['Blackjack'])) {
    echo "variable blackjack using stored game information";
    $blackjack = $_SESSION['Blackjack'];
}



?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post"><button type="submit" name="button">Click</button></form>

</body>
</html>












