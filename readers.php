<?php

class Readers
{

    public function getReadersArray()
    {
        $readers = Array();
        $readers['a'] = new AReader();
        $readers['b'] = new BReader();
        $readers['c'] = new CReader();
        $readers['d'] = new DReader();
        $readers['e'] = new EReader();
        $readers['f'] = new FReader();
        $readers['g'] = new GReader();
        $readers['h'] = new HReader();
        $readers['i'] = new IReader();
        $readers['j'] = new JReader();
        $readers['k'] = new KReader();
        $readers['l'] = new LReader();
        $readers['m'] = new MReader();
        $readers['n'] = new NReader();
        $readers['o'] = new OReader();
        $readers['p'] = new PReader();
        
        return $readers;
    }
}

class AReader
{

    public function addCardsToBoard($firstCard, $board)
    {
        $board->addCard('n', $firstCard);
        $board->addCard('n', $firstCard + 1);
    }
}

class BReader
{

    public function addCardsToBoard($firstCard, $board)
    {
        $board->addCard('n', $firstCard);
        $board->addCard('e', $firstCard + 1);
    }
}

class CReader
{

    public function addCardsToBoard($firstCard, $board)
    {
        $board->addCard('n', $firstCard);
        $board->addCard('s', $firstCard + 1);
    }
}

class DReader
{

    public function addCardsToBoard($firstCard, $board)
    {
        $board->addCard('n', $firstCard);
        $board->addCard('w', $firstCard + 1);
    }
}

class EReader
{

    public function addCardsToBoard($firstCard, $board)
    {
        $board->addCard('e', $firstCard);
        $board->addCard('n', $firstCard + 1);
    }
}

class FReader
{

    public function addCardsToBoard($firstCard, $board)
    {
        $board->addCard('e', $firstCard);
        $board->addCard('e', $firstCard + 1);
    }
}

class GReader
{

    public function addCardsToBoard($firstCard, $board)
    {
        $board->addCard('e', $firstCard);
        $board->addCard('s', $firstCard + 1);
    }
}

class HReader
{

    public function addCardsToBoard($firstCard, $board)
    {
        $board->addCard('e', $firstCard);
        $board->addCard('w', $firstCard + 1);
    }
}

class IReader
{

    public function addCardsToBoard($firstCard, $board)
    {
        $board->addCard('s', $firstCard);
        $board->addCard('n', $firstCard + 1);
    }
}

class JReader
{

    public function addCardsToBoard($firstCard, $board)
    {
        $board->addCard('s', $firstCard);
        $board->addCard('e', $firstCard + 1);
    }
}

class KReader
{

    public function addCardsToBoard($firstCard, $board)
    {
        $board->addCard('s', $firstCard);
        $board->addCard('s', $firstCard + 1);
    }
}

class LReader
{

    public function addCardsToBoard($firstCard, $board)
    {
        $board->addCard('s', $firstCard);
        $board->addCard('w', $firstCard + 1);
    }
}

class MReader
{

    public function addCardsToBoard($firstCard, $board)
    {
        $board->addCard('w', $firstCard);
        $board->addCard('n', $firstCard + 1);
    }
}

class NReader
{

    public function addCardsToBoard($firstCard, $board)
    {
        $board->addCard('w', $firstCard);
        $board->addCard('e', $firstCard + 1);
    }
}

class OReader
{

    public function addCardsToBoard($firstCard, $board)
    {
        $board->addCard('w', $firstCard);
        $board->addCard('s', $firstCard + 1);
    }
}

class PReader
{

    public function addCardsToBoard($firstCard, $board)
    {
        $board->addCard('w', $firstCard);
        $board->addCard('w', $firstCard + 1);
    }
}
?>