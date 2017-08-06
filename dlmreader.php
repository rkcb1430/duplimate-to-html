<?php
require "board.php";
require "readers.php";

class DlmReader
{
    private $readers;

    public function DlmReader()
    {
        $this->readers = (new Readers())->getReadersArray();
    }

    public function readBoardsFromFile($handle)
    {
        $boards = new Boards();
        $firstBoard = 0;
        $lastBoard = 0;
        while (($buffer = fgets($handle)) !== false) {
            $firstBoard = $this->findBoardNo($buffer, "From board=", $firstBoard);
            $lastBoard =  $this->findBoardNo($buffer, "To board=", $lastBoard);
            if ($lastBoard > 0) {
                $boards->firstBoard = $firstBoard;
                $boards->lastBoard = $lastBoard;
                break;
            }
        }
        
        while (($buffer = fgets($handle)) !== false) {
            $p1 = explode("Board ", chop($buffer));
            if (isset($p1[1]) && strlen($p1[1]) > 0) {
                $board = $this->readBoard($p1[1]);
                $boards->setBoard($board->no, $board);
            }
        }
        return $boards;
    }

    private function findBoardNo($buffer, $text, $currentFirst) {
        if ($currentFirst > 0) return $currentFirst;
        $from = strpos($buffer, $text);
        if ($from !== false) {
            $number = str_replace($text, "", $buffer);
            return (int)$number;
        }
        return 0;
    }
    
    private function readBoard($line)
    {
        $board = new Board();
        $p2 = explode("=", $line);
        $cards = $p2[1];
        $no = (int) $p2[0];
        $board->no = $no;
        for ($i = 0; $i < strlen($cards) - 4; ++ $i) {
            $card = $cards[$i];
            $card1 = 2 * $i;
            $reader = $this->readers["$card"];
            if (! isset($reader))
                break;
            $reader->addCardsToBoard($card1, $board);
        }
        return $board;
    }
}
?>