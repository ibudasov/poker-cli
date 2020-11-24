<?php

declare(strict_types=1);

namespace PokerCli\Infrastructure;

use Poker\Card;
use PokerCli\Application\Output;

class ConsoleOutput implements Output
{
    public function println(string $line): void
    {
        echo $line.PHP_EOL;
    }

    function cardToString(Card $card): string
    {
        return $card->getRank()->getValue() . $card->getSuit()->getValue();
    }
}
