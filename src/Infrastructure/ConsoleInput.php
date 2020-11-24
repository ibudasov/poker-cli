<?php

declare(strict_types=1);

namespace PokerCli\Infrastructure;

use BadMethodCallException;
use Poker\Card;
use Poker\Hand;
use Poker\Rank;
use Poker\Suit;
use PokerCli\Application\Input;
use function explode;
use function fgets;
use function fopen;
use function getopt;
use const PHP_EOL;

class ConsoleInput implements Input
{
    const ENCODING_OF_INPUT_FILE = 'UTF-8';
    const DELIMITER_BETWEEN_CARDS_IN_FILE = ' ';

    function getHandHandsInGame(): array
    {
        $fileName = $this->getInputFileOutOfCliParams();

        return $this->parseFileToDomainObjects($fileName);
    }

    private function getInputFileOutOfCliParams(): string
    {
        $cliInput = getopt("", ["inputFile:"]);

        $inputFile = $cliInput['inputFile'];

        if (!isset($cliInput['inputFile']) || empty($cliInput['inputFile'])) {
            die('Please specify input file like this: "--inputFile file.txt"' . PHP_EOL);
        }

        return $inputFile;
    }

    function stringToCard(string $cardAsString): Card
    {
        if (3 === mb_strlen($cardAsString, self::ENCODING_OF_INPUT_FILE)) {
            return new Card(
            // As whole string is 3 chars, we have 2 chars for Rank there
                new Rank(mb_substr($cardAsString, 0, 2)),

                // Suit is only one char
                new Suit(mb_substr($cardAsString, 2, 3))
            );
        }

        if (2 === mb_strlen($cardAsString, self::ENCODING_OF_INPUT_FILE)) {
            return new Card(
            // As whole string is 2 chars, we have 1 chars for Rank there
                new Rank(mb_substr($cardAsString, 0, 1)),

                // Suit is only one char
                new Suit(mb_substr($cardAsString, 1, 2))
            );
        }

        throw new BadMethodCallException('Card as a string should have exactly 2 or 3 chars, got ' . mb_strlen($cardAsString));
    }

    private function parseFileToDomainObjects(string $fileName): array
    {
        if (file_exists($fileName) === false) {
            die('Sorry, we cannot find the file 💁‍' . PHP_EOL);
        }

        $fileResource = fopen($fileName, "rb");

        if ($fileResource == false) {
            die('Sorry, could not read the file 💁‍' . PHP_EOL);
        }

        $hands = [];
        $cards = [];
        while (!feof($fileResource)) {
            while (($fileLine = fgets($fileResource)) !== false) {
                $cardLiterals = explode(self::DELIMITER_BETWEEN_CARDS_IN_FILE, $fileLine);
                foreach ($cardLiterals as $cardLiteral) {
                    $cards[] = $this->stringToCard(trim($cardLiteral));
                }
                $hands[] = new Hand(...$cards);
                $cards = [];
            }
        }
        fclose($fileResource);

        return $hands;
    }
}
