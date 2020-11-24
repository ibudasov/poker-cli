<?php
declare(strict_types=1);

namespace PokerCli\Application;

use Poker\HandRanker;

final class Poker
{
    /** @var Input */
    private $input;

    /** @var Output */
    private $output;

    /** @var HandRanker */
    private $handRanker;

    function __construct(Input $input, Output $output)
    {
        $this->input = $input;
        $this->output = $output;

        $this->handRanker = new HandRanker();
    }

    function showMeWhatYouGot(): void
    {
        $hands = $this->input->getHandHandsInGame();

        $this->output->outputMultipleHands(
            ...$this->handRanker->rankMultipleHands(...$hands)
        );
    }

}