<?php
declare(strict_types=1);

session_start();//Start the PHP session
require './Classes/Blackjack.php';//Require all the files with the classes you already created. Ideally you want a seperate file for each class.
require './Classes/Player.php';
require './Classes/Deck.php';
require './Classes/Suit.php';
require './Classes/Card.php';




if (isset($_SESSION['blackjack'])) {//Check if the session does not have a Blackjack variable yet:
    $serializedGame = serialize(new Blackjack());//Create a new Blackjack object and serialize it.
    $_SESSION['blackjack'] = $serializedGame;//Store the object inside the session.
}
//var_dump($serializedGame);exit;
$unserializedGame = unserialize($serializedGame);//get info out of the storage.

if (isset($_POST['start'])) {
    $newGame = $_SESSION['blackjack'];//Create a new Blackjack object.
    echo "you start with: " . $unserializedGame->getPlayer()->getScore() . "<br>" . "dealer starts with: " . $unserializedGame->getDealer()->getScore();
} elseif (isset($_POST['hit'])) {
    $unserializedGame->getPlayer()->hit($unserializedGame->getDeck());//call hit on player and get the score.
    $_SESSION['blackjack'] = serialize($unserializedGame);
    echo "you now have: " . $unserializedGame->getPlayer()->getScore() . "<br>" . "dealer now has: " . $unserializedGame->getDealer()->getScore();
} elseif (isset($_POST['stand'])) {
    $_SESSION['blackjack'] = serialize($unserializedGame);
    $unserializedGame->getDealer()->hit($unserializedGame->getDeck());//call hit on dealer and get the score.
    $_SESSION['blackjack'] = serialize($unserializedGame);
    echo "you now have: " . $unserializedGame->getPlayer()->getScore() . "<br>" . "dealer now has: " . $unserializedGame->getDealer()->getScore();//When you hit the stand button call hit on dealer, then check the lost status of the dealer.

} elseif (isset($_POST['surrender'])) {
    $_SESSION['blackjack'] = serialize($unserializedGame);
    unserialize($_SESSION['blackjack'])->getPlayer()->surrender();
}

if ($unserializedGame->getPlayer()->hasLost()) {
    $serializedGame = serialize(new Blackjack());//Create a new Blackjack object and serialize it.
    $_SESSION['blackjack'] = $serializedGame;//Store the object inside the session.
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BlackJack in PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
    <div class="cards_container">
        <!--    Player Get the card-->
        <div class="player_container">
            <h3> Player: </h3>
            <?php foreach($unserializedGame->getPlayer()->getCards()  as $cardIndex => $card):?>
              <span class="cards"><?= $card->getUnicodeCharacter()?></span>
            <?php endforeach?>
        </div>
        <div class="dealer_container">
            <!--    Dealer Get the card-->
            <h3>Dealer: </h3>
            <?php foreach ($unserializedGame->getDealer()->getCards() as $cardIndex => $card):?>
                <span class="cards"><?= $card->getUnicodeCharacter()?> </span>
            <?php endforeach?>
        </div>
    </div>


    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
