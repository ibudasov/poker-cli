<?php
declare(strict_types=1);

namespace PokerCli\Application;


use Poker\Hand;

interface Input
{
    /** @return Hand[] */
    function getHandHandsInGame(): array;
}