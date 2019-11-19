<?php

$cards = array('k', 9, 'q', 'j', 10);
//$cards = array('k',9,7 ,8, 10);

$tst = array('a' => 1, 'j' => 11, 'q' => 12, 'k' => 13);
$data = array();

foreach ($cards as $card) {
    if (array_key_exists($card, $tst)) {
        array_push($data, $tst[$card]);
    } else {
        array_push($data, $card);
    }
}

rsort($data);
$last = 0;
foreach ($data as $value) {
    if ($last <> 0) {
        if ((($last - $value) == 1) || (($last == 10) && ($value == 1))) {
            
        } else {
            break;
        }
    }
    $last = $value;
}
