<?php

declare(strict_types=1);

namespace PokerCli\Application;

use Poker\Hand;

interface Output
{
    public function println(string $line): void;

    public function outputMultipleHands(Hand ...$hands): void;
}
