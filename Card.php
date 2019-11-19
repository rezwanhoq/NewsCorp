<?php

$suit = array('c', 'd', 'h', 's');
$card = array('a', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'j', 'q', 'k');
$value = array('a' => 1, 'j' => 11, 'q' => 12, 'k' => 13);
$shuffled = shuffleCards($suit, $card);
$ss = straightOrStraightFlush($shuffled, $value);

function shuffleCards($suits, $cards) {

    $allCards = array();
    foreach ($cards as $card) {
        foreach ($suits as $suit) {
            array_push($allCards, $card . $suit);
        }
    }
    shuffle($allCards);
    $cards = array_slice($allCards, 0, 5, true);
    return $cards;
}

function straightOrStraightFlush($shuffledCards, $v) {
    $data = array();
    foreach ($shuffledCards as $card) {
        $card = substr($card, 0, strlen($card) - 1);
        array_key_exists($card, $v) ? array_push($data, $v[$card]) : array_push($data, $card);
    }
    rsort($data);
    $last = 0;
    foreach ($data as $value) {
        if ($last <> 0) {
            if (($last - $value == 1) || ($last == 10 && $value == 1)) {
                
            } else {
                return false;
            }
        }
        $last = $value;
    }
    return true;
}

?>
