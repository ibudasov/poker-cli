<?php
declare(strict_types=1);

use PokerCli\Application\Poker;
use PokerCli\Infrastructure\ConsoleInput;
use PokerCli\Infrastructure\ConsoleOutput;

require __DIR__ . '/vendor/autoload.php';

$input = new ConsoleInput();
$output = new ConsoleOutput();
$game = new Poker($input, $output);

$game->showMeWhatYouGot();
