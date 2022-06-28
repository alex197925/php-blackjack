<?php

declare(strict_types=1);

class Player {
    private array $cards;
    private bool $lost = false;

    public  function __construct(Deck $deck) {

     for ($i = 0; $i < 2; $i++) {
         $this->cards[]=$deck->drawCard();
     }

        $this->cards[] = $deck->drawCard();
        $this->cards[] = $deck->drawCard();
    }




    public function hit() {

        if ($this->getScore()> 21) {
            $this->lost= true;
        }
    }

    public function surrender() {
        $this->lost= true;

    }

    public function getScore() {
        $score = 0;
        $cards = $this->cards;
        foreach ($cards as $card) {
            $score += $card->getValue();
        }

    }


    public function hasLost(): bool
    {
        return $this->lost;
    }


}