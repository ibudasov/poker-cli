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
        foreach ($this->input->getHandHandsInGame() as $hand) {
            $this->output->println(
                (string)$this->handRanker->rankTheHand($hand)
            );
        }
    }

}