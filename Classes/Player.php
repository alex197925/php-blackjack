<?php

declare(strict_types=1);

class Player {
    private array $cards;
    private bool $lost = false;

    public  function __construct(Deck $deck) {
        $this->lost = false;
        $this->cards = [];
     for ($i = 0; $i < 2; $i++) {
         $this->cards[]=$deck->drawCard();
     }

        $this->cards[] = $deck->drawCard();
        $this->cards[] = $deck->drawCard();
    }




    public function hit($deck) {
        $this->cards = $deck->drawCard();
        if ($this->getScore()> 21) {
            $this->lost= true;
        }
    }

    public function surrender() {
        $this->lost= true;

    }

    public function getScore(): int
    {
        $score = 0;
        $cards = $this->cards;
        foreach ($cards as $card) {
            $score += $card->getValue();
        }
        return $score;

    }


    public function hasLost(): bool
    {
        return $this->lost;
    }

}

class Dealer extends Player {
         public function hit ($deck) :void {
        if ($this->getScore()<=15) {
            parent::hit($deck);
        }
   }
}



