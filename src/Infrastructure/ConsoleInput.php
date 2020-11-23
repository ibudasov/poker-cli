<?php

declare(strict_types=1);

namespace PokerCli\Infrastructure;

use Poker\Card;
use Poker\Hand;
use Poker\Rank;
use Poker\Suit;
use PokerCli\Application\Input;
use PokerCli\Application\Output;

class ConsoleInput implements Input
{
    function getHandHandsInGame(): array
    {
        return [
            new Hand(...[
                new Card(Rank::ACE(), Suit::CLUBS()),
                new Card(Rank::KING(), Suit::CLUBS()),
                new Card(Rank::QUEEN(), Suit::CLUBS()),
                new Card(Rank::JACK(), Suit::CLUBS()),
                new Card(Rank::SEVEN(), Suit::CLUBS()),
            ]),
            new Hand(...[
                new Card(Rank::ACE(), Suit::CLUBS()),
                new Card(Rank::KING(), Suit::CLUBS()),
                new Card(Rank::QUEEN(), Suit::CLUBS()),
                new Card(Rank::JACK(), Suit::CLUBS()),
                new Card(Rank::TEN(), Suit::CLUBS()),
            ]),
        ];
    }
}
