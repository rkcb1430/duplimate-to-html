<?php
class Hand
{
    public $spades;
    public $hearts;
    public $diams;
    public $clubs;
    
    public function Hand() {
        $this->spades = Array();
        $this->hearts = Array();
        $this->diams = Array();
        $this->clubs = Array();
    }
    
    public function getSuit($suitname)
    {
        if ($suitname == "S") {
            $suit = $this->spades;
            $r = "&spades;";
        }
        if ($suitname == "H") {
            $suit = $this->hearts;
            $r = "&hearts;";
        }
        if ($suitname == "D") {
            $suit = $this->diams;
            $r = "&diams;";
        }
        if ($suitname == "C") {
            $suit = $this->clubs;
            $r = "&clubs;";
        }
        for ($i = 14; $i > 1; -- $i) {
            if (isset($suit[$i])) {
                $r .= $this->asCard($i);
            }
        }
        return $r;
    }
    
    public function addCard($card)
    {
        $rankno = 14 - ($card % 13);
        $suitno = 1 + (int) ($card / 13);
        switch ($suitno) {
            case 1:
                $this->spades[$rankno] = true;
                break;
            case 2:
                $this->hearts[$rankno] = true;
                break;
            case 3:
                $this->diams[$rankno] = true;
                break;
            case 4:
                $this->clubs[$rankno] = true;
                break;
        }
    }
    
    private function asCard($i)
    {
        if ($i == 14)
            return "A";
            if ($i == 13)
                return "K";
                if ($i == 12)
                    return "Q";
                    if ($i == 11)
                        return "J";
                        if ($i == 10)
                            return "T";
                            return $i;
    }
}
?>