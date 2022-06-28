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

<form method="post" action="Classes/Player.php">
    <button type="submit" name="hit">Hit</button>
    <button type="submit" name="surrender">Surrender</button>
    <button type="submit" name="stand">Stand</button>

</form>














