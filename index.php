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





?>

<form method="post" action="Classes/Player.php">
     <button type="submit" name="start">Start</button>
    <button type="submit" name="hit">Hit</button>
    <button type="submit" name="surrender">Surrender</button>
    <button type="submit" name="stand">Stand</button>

</form>














