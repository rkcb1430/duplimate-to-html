<?php

require "hand.php";

class Board
{
    
    public $no;
    
    public $n;
    
    public $s;
    
    public $e;
    
    public $w;
    
    public function Board()
    {
        $this->n = new Hand();
        $this->s = new Hand();
        $this->e = new Hand();
        $this->w = new Hand();
    }
    
    public function hands()
    {
        $r = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " . $this->hand($this->n) . "<br /><br />";
        $r .= " " . $this->hand($this->w);
        $r .= " <-> " . $this->hand($this->e) . "<br /><br />";
        $r .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " . $this->hand($this->s);
        return $r;
    }
    
    public function hand($hand) {
        return $this->printHand($hand, " ");
    }
    
    public function printHand($hand, $delim)
    {
        $r = $hand->getSuit("S");
        $r .= $delim . $hand->getSuit("H");
        $r .= $delim . $hand->getSuit("D");
        $r .= $delim . $hand->getSuit("C");
        return $r;
    }
    
    public function addCard($hand, $card)
    {
        if ($hand == 'n')
            $this->n->addCard($card);
            if ($hand == 's')
                $this->s->addCard($card);
                if ($hand == 'e')
                    $this->e->addCard($card);
                    if ($hand == 'w')
                        $this->w->addCard($card);
    }
    
    private function getNormalizedBoardNumber() {
        $no16 = $this->no;
        if ($no16 > 16) {
            $no16 = $no16 % 16;
        }
        return $no16;
    }
    
    public function getDealer() {
        $no4 = $this->no % 4;
        if ($no4 == 1) return "North";
        if ($no4 == 2) return "East";
        if ($no4 == 3) return "South";
        if ($no4 == 0) return "West";
    }
    
    public function getVulnerability() {
        $no16 = $this->getNormalizedBoardNumber();
        switch ($no16) {
            case 1: return "None";
            case 2: return "NS";
            case 3: return "EW";
            case 4: return "Both";
            case 5: return "NS";
            case 6: return "EW";
            case 7: return "Both";
            case 8: return "None";
            case 9: return "EW";
            case 10: return "Both";
            case 11: return "None";
            case 12: return "NS";
            case 13: return "Both";
            case 14: return "None";
            case 15: return "NS";
            case 16: return "EW";
            default: return "error";
        }
    }
    public function printout() {
        return "<table>".
            "<tr><td>Board: " . $this->no . "<br />Deal: " . $this->getDealer().
            "<br />Vuln: " . $this->getVulnerability()."</td><td>".$this->printHand($this->n, "<br />")."</td><td></td></tr>".
            "<tr><td>".$this->printHand($this->w, "<br />")."</td><td></td><td>".$this->printHand($this->e, "<br />")."</td></tr>".
            "<tr><td></td><td>".$this->printHand($this->s, "<br />")."</td><td></td></tr>".
            "</table>\n";
    }
}

class Boards
{
    public $boards;
    public $firstBoard;
    public $lastBoard;
    
    public function Boards()
    {
        $boards = Array();
        $firstBoard = 0;
        $lastBoard = 0;
    }
    
    public function setBoard($pos, $board) {
        $this->boards[$pos] = $board;
    }
}
?>