<?php
namespace App\utils;


use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Counter {
    private int $counter;

    function __construct(SessionInterface $session){

        if ($session->has('counter')){
            $this->counter = $session->get('counter');
            return;
        }

        $fileCounter = fopen('/Users/quentinsimonin/Desktop/Formation dev web/Symfony/filrouge/src/counter.txt', 'r');
        $cnt = fread($fileCounter, filesize('/Users/quentinsimonin/Desktop/Formation dev web/Symfony/filrouge/src/counter.txt'));
        fclose($fileCounter);
        $this->counter = $cnt;
        $session->set('counter',$cnt);

    }

    /**
     * @return int
     */
    public function getCounter(): int
    {
        return $this->counter;
    }

    function __destruct(){
        $fileCounter = fopen('/Users/quentinsimonin/Desktop/Formation dev web/Symfony/filrouge/src/counter.txt', 'w');
        $ajoutVisit = $this->counter +1;
        fwrite($fileCounter, $ajoutVisit );
        fclose($fileCounter);
    }

}