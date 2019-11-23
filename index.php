<?php

include 'Poker.php';

$cc = new poker();

$shuffled = $cc->shuffleCards();
$output = $cc->straightOrStraightFlush($shuffled);
var_dump($shuffled);
var_dump($output);
