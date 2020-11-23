<?php

declare(strict_types=1);

namespace PokerCli\Application;

interface Output
{
    public function println(string $line): void;
}
